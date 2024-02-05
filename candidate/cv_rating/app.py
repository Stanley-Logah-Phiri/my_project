import mysql.connector
from flask import Flask, jsonify, request, session, redirect, url_for, render_template, send_file
from bson import ObjectId
from waitress import serve
from datetime import datetime, timedelta
from flask_cors import CORS
from sklearn.feature_extraction.text import CountVectorizer
from sklearn.metrics.pairwise import cosine_similarity
import re
import pytesseract
from functools import wraps
from PIL import Image
import uuid
import os
revoked_tokens = []
import PyPDF2
from flask_bcrypt import Bcrypt



import jwt




# Replace these with your database credentials
db_config = {
    'host': 'localhost',
    'user': 'root',
    'password': '',
    'database': 'tnm_portal'
}



token = "your_jwt_token"  # Replace with your JWT
secret_key = "your_secret_key"
algorithm = "HS256"
exp= datetime.utcnow() + timedelta(hours=2)



app = Flask(__name__)
CORS(app, supports_credentials=True)
app.secret_key ="srevvhhhff"
app.config['UPLOAD_FOLDER'] = os.path.join(os.getcwd(), 'uploads')
bcrypt = Bcrypt(app)


os.makedirs(app.config['UPLOAD_FOLDER'], exist_ok=True)


import functools
from flask import jsonify
        # Attempt to establish a connection
conn = mysql.connector.connect(**db_config)
cursor = conn.cursor()


@app.route('/')
def index():
    file_path = os.path.join(app.config['UPLOAD_FOLDER'], "studyhacks-docs.pdf")
    return send_file(file_path)


# UpLOAD pDF
@app.route('/pdfs', methods=['POST'])
def upload_pdf():
    print(request.files['cv'].filename)
    email=request.form.get('email')
    user_id=request.form.get('user_id')
    job_id=request.form.get('job_id')
    fullname=request.form.get('fullname')
    status = request.form.get('status') if request.form.get('status') else "pending"

    
    # cv_file_path=request.form.get('cv_file_path')
    # cover_letter_file_path=request.form.get('cover_letter_file_path')
    select_query="SELECT * FROM job_applications WHERE user_id = {} AND job_id = {}".format(user_id, job_id)
    cursor.execute(select_query)
    result = cursor.fetchone()
    if(result):
        return jsonify({"message":"already applied for this job"})

    if 'cover_letter' not in request.files:
        return "No file part", 400
    
    coverL = request.files['cover_letter']
    
    if coverL.filename == '':
        return "No selected file", 400
    unique_id = uuid.uuid4()
    _id = str(ObjectId())
    pdf_loc=os.path.join(app.config['UPLOAD_FOLDER'],  str(unique_id)+".pdf")
    coverL.save(pdf_loc)
    
    if 'cv' not in request.files:
        return "No file part", 400
    
    cv = request.files['cv']
    
    if cv.filename == '':
        return "No selected file", 400
    unique_id = uuid.uuid4()
    _id = str(ObjectId())
    pdf_loc=os.path.join(app.config['UPLOAD_FOLDER'],  str(unique_id)+".pdf")
    cv.save(pdf_loc)
    extracted_text = extract_text_from_pdf(pdf_loc)
    data = {}
    select_query = """
    SELECT * FROM tnm_portal.jobs WHERE job_id = {};
    """.format(job_id)
        
    cursor.execute(select_query)
    result = cursor.fetchall()

    title=list(result[0])[1:][0]
    description=list(result[0])[1:][1]
    qualifications=list(result[0])[1:][2]
    responsibility=list(result[0])[1:][3]
    cv_file_path="/uploads"+cv.filename
    cover_letter_file_path="/uploads"+coverL.filename
    details="title: "+title+", description: "+description+", qualifications: "+qualifications+ ", and responsibility: "+responsibility
    text = [extracted_text, details]
    c = CountVectorizer()
    count_matrix = c.fit_transform(text)
    matc = cosine_similarity(count_matrix)[0][1]*100
    answer = round(matc, 2)
    
    
    
    insert_query = """
    INSERT INTO job_applications (user_id, job_id, fullname, email, cv_file_path, cover_letter_file_path,score,status)
    VALUES (%s, %s, %s, %s, %s, %s, %s, %s)
    """
    cursor.execute(insert_query, (user_id, job_id, fullname, email, cv_file_path, cover_letter_file_path,float(answer),status))
    conn.commit()
    return str(answer)
        

def extract_text_from_pdf(pdf_file_path):
    try:
        text = ''
        with open(pdf_file_path, 'rb') as pdf_file:
            pdf_reader = PyPDF2.PdfReader(pdf_file)
            pages = pdf_reader.pages
            for page_number in range(len(pages)):
                page = pdf_reader.pages[page_number]
                text += page.extract_text()
            return text
    except Exception as e:
        return text

if __name__ == "__main__":
    serve(app, host="0.0.0.0", port=8080)


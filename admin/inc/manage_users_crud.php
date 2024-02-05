<?php
require_once("inc/init.php");
$sql = "SELECT * FROM users"; 
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
/*                     echo "<tr>";
                    echo "<td>" . $row["user_id"] . "</td>";
                    echo "<td>" . $row["full_name"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . '<a href="view_user_portfolio.php?id=' . $row['user_id'] . '">' . 'View Portfolio' . '</a></td>';

                    echo "</tr>"; */
                    echo "
                    <tr>
                        <td>". $row['user_id']."</td>
                        <td>". $row['full_name']."</td>
                        <td>". $row['email']."</td>
                        <td>". $row['status']."</td>
                        <td>
                            <a class='btn btn-primary' href='#user_details_".$row['user_id']."'data-toggle='modal' >
                                <i class='fa fa-eye'></i>
                                <span>View</span>
                            </a>
                            <a class='btn btn-danger' href='#user_deactivate_".$row['user_id']."' data-toggle='modal'>
                                <i class='fa fa-ban'></i>
                                <span>Deactvate</span>
                            </a>
                        </td>
                    </tr>

                    ";
                    include('inc/user_modal.php');
                }
            } else {
                echo "<tr><td colspan='3'>No records found</td></tr>";
            }

            $conn->close();
?>
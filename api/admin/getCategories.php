<?php 
	include "../db-config.php";

	$categoryArray = array();
	$counter = 1;
	$getQuery = "SELECT * FROM categories ORDER BY category_name ASC";
	$result = $database->query($getQuery);

	if ($result->num_rows > 0) {
		echo "<table class='striped responsive-table'>
                <h5><strong>Post Categories</strong></h5><hr/>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            	<tbody>";
		while ($row = $result->fetch_assoc()) {
			$categoryId = $row['category_id'];
			$categoryName = $row['category_name'];

			$categoryArray["categoryName"] = $categoryName;
			$categoryArray["categoryId"] = intval($categoryId);

			$categoryObj = json_encode($categoryArray);

			echo "
				<tr>
                    <td>$counter</td>
                    <td>$categoryName</td>
                    <td>
                        <i class='fa fa-pencil action-icon-edit' onclick='showEditCategoryForm($categoryObj)'></i>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                        <i class='fa fa-trash-o action-icon-delete' onclick='showDeleteCategoryDialog($categoryObj)'></i>
                    </td>
                </tr>";
			$counter ++;
		}

		echo "</tbody>
            </table>";


	} else {
		echo "
			<section class='row jumbotron'>
				<h4 class='center-align no-items-text'>There Are No Categories Available</h4>
			</section>
		";
	}

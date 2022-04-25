<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home">
						<use xlink:href="#stroked-home"></use>
					</svg></a></li>
			<li class="active">Quản lý danh mục</li>
		</ol>
	</div>
	<!--/.row-->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Quản lý từ xấu</h1>
		</div>
	</div>
	<!--/.row-->
	<div id="toolbar" class="btn-group">
		<a href="index.php?page_layout=add_keyword" class="btn btn-success">
			<i class="glyphicon glyphicon-plus"></i> Thêm từ xấu
		</a>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<table data-toolbar="#toolbar" data-toggle="table">

						<thead>
							<tr>
								<th data-field="id" data-sortable="true">ID</th>
								<th>Từ khoá</th>
								<th>Hành động</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if (isset($_GET["page"])) {
								$page = $_GET["page"];
							} else {
								$page = 1;
							}
							$rows_per_page = 5;
							$per_row = $page * $rows_per_page - $rows_per_page;
							$total_rows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM rep_cmt"));
							$total_pages = ceil($total_rows / $rows_per_page);
							$list_page = '<ul class="pagination">';
							// Page_prev
							$page_prev = $page - 1;
							if ($page_prev == 0) {
								$page_prev = 1;
							}
							$list_page .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=rep_comment&page=' . $page_prev . '">&laquo;</a></li>';
							for ($u = 1; $u <= $total_pages; $u++) {
								$list_page .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=rep_comment&page=' . $u . '">' . $u . '</a></li>';
							}
							// page_next
							$page_next = $page + 1;
							if ($page_next > $total_pages) {
								$page_next = $total_pages;
							}
							$list_page .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=rep_comment&page=' . $page_next . '">&raquo;</a></li>';
							$list_page .= '</ul>';

							$sql = "SELECT * FROM rep_cmt
									ORDER BY rep_id ASC
									LIMIT $per_row, $rows_per_page";
							$query = mysqli_query($conn, $sql);
							while ($row = mysqli_fetch_array($query)) {

							?>
								<tr>
									<td style=""><?php echo $row["rep_id"]; ?></td>
									<td style=""><?php echo $row["rep_keyword"]; ?></td>
									<td class="form-group">
										<a href="index.php?page_layout=edit_keyword&rep_id=<?php echo $row["rep_id"]?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
										<a href="del_keyword.php?rep_id=<?php echo $row["rep_id"] ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<div class="panel-footer">
					<nav aria-label="Page navigation example">

						<?php echo $list_page; ?>

					</nav>
				</div>
			</div>
		</div>
	</div>
	<!--/.row-->
</div>
<!--/.main-->

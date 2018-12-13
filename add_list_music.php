<?php
	session_start();
    if($_SESSION["level"] == 1)
    {
    	require("templates/header.php");

		$err = array();
		$err["add"] = NULL;

		if(isset($_POST["ok"]))	
		{
			//stripslashes loại bỏ ký tự \ trước dấu '
			$song = addslashes(stripslashes($_POST["song"]));
			$singer = addslashes(stripslashes($_POST["singer"]));
			$musician = addslashes(stripslashes($_POST["musician"]));
			$country = addslashes(stripslashes($_POST["country"]));
			$style = addslashes(stripslashes($_POST["style"]));
			$new = addslashes(stripslashes($_POST["$new"]));
			$best = addslashes(stripslashes($_POST["$best"]));
			$topten = addslashes(stripslashes($_POST["topten"]));

			if(isset($song) && isset($singer) && isset($musician) && isset($country) && isset($style) && isset($new) && isset($best) && isset($topten))
			{
				require("../public/library/database.php");
				$sql = "SELECT * FROM music WHERE song = '$song'";
				$kt = mysqli_query($conn,$sql);
				if(mysqli_num_rows($kt)>0)
				{
					$err["add"] = "* Tên bài hát đã tồn tại";
				}
				else
				{
					$sql = "INSERT INTO music(song,
											  singer,
											  musician,
											  country,
											  style,
											  new,
											  best,
											  topten)	VALUES	
											  ('$song',
											   '$singer',
											   '$musician',
											   '$country',
											   '$style',
											   '$new',
											   '$best',
											   '$topten')";

					mysqli_query($conn,$sql);
					$err["add"] = "* Thêm bài hát thành công";					   	
				}					
				mysqli_close($conn);						   								   
			}
		}	
    } 
	else
	{
		ob_start(); 
		header('Location: ../index.php');
		ob_end_flush();
	}
?>	
	<form action="add_list_music.php" method="post">	
		<h2>Thêm bài hát</h2>
		<div>
			<div>
				<input style="height: 24px; width: 300px;" type="text" name="tenbh" placeholder="Tên bài hát" value required>
				<div></div>
			</div>
			<div>
				<input style="height: 24px; width: 300px;" type="text" name="tencs" placeholder="Tên ca sĩ" value required>
				<div></div>
			</div>
			<div>
				<input style="height: 24px; width: 300px;" type="text" name="tenns" placeholder="Tên nhạc sĩ" value required>
				<div></div>
			</div>
			<div>
				<input style="height: 24px; width: 300px;" type="text" name="url" placeholder="Đường dẫn file" value required>
				<div></div>
			</div>
				
		<button style="height: 30px;" type="submit" name="ok">Thêm</button>
	</form>

	<div style="width: 500px; margin: 30px; text-align: center; color: red;">
		<?php  
			echo $err["add"];
		?>
	</div>

<?php  
	require("templates/footer.php");
?>

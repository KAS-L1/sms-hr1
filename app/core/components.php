<?php

/**
 * REUSABLE GLOBAL COMPONENTS
**/

function Refresh($seconds = null){
	if(!isset($seconds)){
		?>
			<script>location.reload()</script>
		<?php
	}else{
		?>
			<script>setTimeout(function(){ location.reload() }, <?=$seconds?>)</script>
		<?php
	}
}

function Redirect($url, $seconds = null){
	if(!isset($seconds)){
		?>
			<script>window.location.href="<?=$url?>"</script>
		<?php
	}else{
		?>
			<script>
				setTimeout(function(){ location.href="<?=$url?>" }, "<?=$seconds?>")
			</script>
		<?php
	}
}


// TEMPLATE COMPONENTS

function Required(){
    ?><span class="text-danger app__required">*</span><?php
}

function Alert($type, $text){
	?>
	   <div class="alert alert-<?=$type?> app__alert animate__animated animate__fadeIn"><?=$text?></div>
	<?php
}

function Success($text){
	?>
	   <div class="alert alert-success app__alert animate__animated animate__fadeIn"><?=$text?></div>
	<?php
}

function Warning($text){
	?>
	   <div class="alert alert-warning app__alert animate__animated animate__fadeIn"><?=$text?></div>
	<?php
}

function Error($text){
	?>
	   <div class="alert alert-danger app__alert animate__animated animate__fadeIn"><?=$text?></div>
	<?php
}

function SwalAlert($type, $title, $buttonText = null, $text = null){
	if($type == "success"){
		$color = 'var(--bs-success)';
	}else if($type == "warning"){
		$color = 'var(--bs-warning)';
	}
	else if($type == "error"){
		$color = 'var(--bs-danger)';
	}else{
		$color = 'var(--bs-primary)';
	}
	?>
		<script>
			Swal.fire({
				icon: "<?=$type?>",
				title: "<?=$title?>",
				text: "<?=$text?>",
				confirmButtonText: "<?=isset($buttonText) ? $buttonText : 'Okay'?>",
				confirmButtonColor: "<?=$color?>"
			})
		</script>
	<?php
}

function SwalAction($url, $type, $title, $buttonText = null, $text = null){
	
	?>
		<script>
			Swal.fire({
				icon: "<?=$type?>",
				title: "<?=$title?>",
				text: "<?=$text?>",
				confirmButtonText: "<?=isset($buttonText) ? $buttonText : 'Okay'?>",
				confirmButtonColor: "<?=APP_THEME['primary']?>"
			}).then(function(){
                window.location = "<?=$url?>";
            })
		</script>
	<?php
}

function Toast($type, $message, $position = null, $timer = null)
{
    if ($type == "success") {
        $color = 'success';
    } else if ($type == "warning") {
        $color = 'warning';
    } else if ($type == "error") {
        $color = 'danger';
    } else {
        $color = 'primary';
    }
    ?>
		<script>
			$(function () {
				var Toast = Swal.mixin({
					toast: true,
					position: "<?=isset($position) ? $position : 'top-right'?>",
					showConfirmButton: false,
					timerProgressBar: true,
					timer: <?=isset($timer) ? $timer : 2000?>,
					customClass: {
						popup: "color-<?=$color?>",
					},
				});
				Toast.fire({
					icon: "<?=$type?>",
					title: "<?=$message?>"
				})
			})
		</script>
    <?php
}

function Input($type, $name, $value= null, $placeholder = null, $class = null, $attributes= null){
	?>
		<input type="<?=$type?>" name="<?=$name?>" id="<?=$name?>" value="<?=$value?>" placeholder="<?=$placeholder?>" class="form-control <?=$class?>" <?= $attributes?> />
	<?php
}

function Password($name, $value = null, $placeholder = null, $class = null, $attributes = null)
{
    ?>
		<style>
			.password__input-wrapper {
				position: relative;
			}
			.toggle-password {
				position: absolute;
				top: 50%;
				right: 0.9rem;
				transform: translateY(-50%);
				cursor: pointer;
			}
		</style>
		<div class="password__input-wrapper">
			<input 
				type="password" 
				name="<?=$name?>" 
				id="<?=$name?>" 
				value="<?=$value?>" 
				placeholder="<?=$placeholder?>" 
				class="form-control <?=$class?>" 
				<?=$attributes?> 
			/>
			<span 
				type="button" 
				class="toggle-password py-2 px-1" 
				onclick="togglePasswordVisibility('<?=$name?>', this)"
			>
				<i class="bi bi-eye-slash"></i>
			</span>
		</div>
		<script>
			function togglePasswordVisibility(inputId, button) {
				const input = document.getElementById(inputId);
				const icon = button.querySelector('i');
				if (input.type == "password") {
					input.type = 'text';
					icon.classList.remove('bi-eye-slash');
					icon.classList.add('bi-eye');
				} else {
					input.type = 'password';
					icon.classList.remove('bi-eye');
					icon.classList.add('bi-eye-slash');
				}
			}
		</script>
    <?php
}

function Button($type, $id, $text, $color, $class = null, $width = null, $attributes= null)
{
	?>
		<button type="<?=$type?>" id="<?=$id?>" class="btn btn-<?=$color?> btn-lg uppercase font-bold text-lg px-4 <?=!empty($width) ? 'w-100' : '' ?> <?=$class?>" <?= $attributes?>>
			<?= $text ?>
		</button>
	<?php
}
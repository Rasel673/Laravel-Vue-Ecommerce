<template>
  <!-- 404 content section start -->
		<div class="pages error-page section-padding">
			<div class="container text-center">
				<div class="error-content">
					<img src="frontend/img/error.png" alt="" />
					<h4>Ooops.... Error 404</h4>
					<p>Sorry, But the page you are looking for does't exist</p>
					<form action="#" method="get">
						<input type="text" placeholder="Search within these results..." />
						<button type="submit"><i class="mdi mdi-magnify"></i></button>
					</form>
					<h5>or</h5>
					<router-link to="/">go to home page</router-link>
				</div>
			</div>
		</div>
		<!-- 404 content section end -->
</template>

<script>
export default {

}
</script>

<style>

</style>
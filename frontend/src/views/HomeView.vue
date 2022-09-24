<script>
import HomeSlide from "../components/HomeSlide.vue";
import image from "../assets/home_school.jpg"

export default {
  data: function () {
    return {
      image
    }
  },
  components: {
    HomeSlide
  }
}
</script>

<template>
  <div>
    <HomeSlide/>
    <div class="container my-5">
      <div class="row">
        <div class="col-5">
          <h2>School About</h2>
          <p><b>Sed ultrices nisl velit, eu ornare est ullamcorper a. Nunc quis nibh magna. Proin risus erat, fringilla vel purus sit amet.</b></p>
          <p>Mauris mollis lobortis turpis, eget accumsan ante aliquam quis. Nam ullamcorper rhoncus sem vitae tempus mattis porta enim. Duis fermentum faucibus est, sed vehicula velit sodales vitae.</p>
        </div>
        <div class="col-7">
          <img :src="image" alt="">
        </div>
      </div>
    </div>
    <div class="container">
      <p>Coppyright @ 2022</p>
    </div>
  </div>

</template>


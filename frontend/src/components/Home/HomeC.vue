<template>
  <div>
    <header>
      <!-- <div class="hero">
                <img class="" src="../../assets/img/pexels-gdtography-911758.jpg" alt="">
            </div> -->
      <div
        class="hero min-h-screen"
        style="background-image: url(https://images.pexels.com/photos/911758/pexels-photo-911758.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940)"
      >
        <div class="hero-overlay bg-opacity-60"></div>
        <div class="hero-content text-center text-neutral-content">
          <div class="max-w-md">
            <h1 class="mb-5 text-5xl font-bold">Hello there</h1>
            <p class="mb-5">
              Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda
              excepturi exercitationem quasi. In deleniti eaque aut repudiandae
              et a id nisi.
            </p>
            <button class="btn btn-primary">Get Started</button>
          </div>
        </div>
      </div>
    </header>
  </div>
</template>

<script>
export default {
  name: "homeComponent",
};
</script>

<style>
.hero{
    width: 100%;
    height: 100%;
    background-size:100% 50%;
    background-repeat: no-repeat;
}

</style>
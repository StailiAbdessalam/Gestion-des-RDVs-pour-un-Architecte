<template>
  <div>
    <header>
      <!-- <div class="hero">
                <img class="" src="../../assets/img/pexels-gdtography-911758.jpg" alt="">
            </div> -->

      <div
        class="bg-gray-100"
        style="
          background-image: url(https://images.pexels.com/photos/911758/pexels-photo-911758.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940);
          background-size: 100% 100%;
        "
      >
        <div class="hero-overlay bg-opacity-60">
          <div class="mx-auto flex flex-col items-center py-12 sm:py-24">
            <div
              class="
                w-11/12
                sm:w-2/3
                lg:flex
                justify-center
                items-center
                flex-col
                mb-5
                sm:mb-10
              "
            >
              <h1
                class="
                  text-2xl
                  sm:text-3xl
                  md:text-4xl
                  lg:text-5xl
                  xl:text-6xl
                  text-center text-gray-800
                  font-black
                  leading-7
                  md:leading-10
                  text-sky-100
                "
              >
                The Freedom to Create the
                <span class="text-sky-500">Home</span>
                You Want
              </h1>
              <p
                class="
                  mt-5
                  sm:mt-10
                  lg:w-10/12
                  text-gray-100
                  font-normal
                  text-center text-sm
                  sm:text-lg
                "
              >
                Nous avons ce dont vous avez besoin!
              </p>
            </div>
            <div class="flex justify-center items-center">
              <button
                class="
                  focus:outline-none
                  focus:ring-2
                  focus:ring-offset-2
                  focus:ring-indigo-700
                  bg-sky-500
                  transition
                  duration-100
                  ease-in-out
                  hover:bg-sky-600
                  lg:text-xl lg:font-bold
                  rounded
                  text-white
                  px-4
                  sm:px-10
                  border border-sky-600
                  py-2
                  sm:py-4
                  text-sm
                "
              >
                Book An Appointment
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="bg-gray-100">
        <div
          class="container mx-auto flex flex-col items-center py-12 sm:py-24"
        >
          <div>
            <h1 class="text-6xl font-medium no-underline md:underline mb-20">
              About Us
            </h1>
          </div>
          <div class="flex justify-center items-center">
            <div>
              <i icon="fa-solid fa-gem" />
              <p class="w-[80%] text-center">
                Nous sommes une Agence d'Architecture basée à Safi - Maroc,
                fondée Yasser RACHID, Architecte Diplomé par l'Ecole Nationale
                d'Architecture de Rabat. Nous travaillons sur les projets
                d'Architecture, d'Urbanisme et de Design; Nous couvrons un large
                spectre de typologies, d'échelles et de styles. Notre approche
                collaborative et analytique a pour but de répondre à un
                programme physique ainsi qu'un concept. Notre philosophie de
                travail est de développer des solutions Contemporaines,
                Intelligentes et Innovantes.
              </p>
            </div>
            <img
              src="https://www.yasserrachid.com/img/portfolio/thumbnails/46.jpg"
              alt=""
            />
          </div>
        </div>
      </div>
      <div class="bg-gray-600 justify-center items-center ">
        <div
          class="container mx-auto flex flex-col items-center py-12 sm:py-24"
        >
          <div>
            <h1 class="text-6xl font-medium no-underline md:underline mb-20">
              NOUS CONTACTER
            </h1>
          </div>
          <p>
            Etes-vous prêt à rêver votre projet avec nous? Nous vous invitons à
            prendre RENDEZ-VOUS via Notre sitewebe, E-Mail ou Téléphone. Nous
            serons heureux de vous accueillir et de vous accompagner pour
            concretiser vos idées.
          </p>
          <br>
          <div class="flex flex-col">
          <span class="text-sky-500">+212(0)660-655328 (Tél & WhatsApp) </span>
          <span class="text-sky-500"> hafid.Benhfid.Architecte@gmail.com</span>
          </div>
        </div>
      </div>
      <div class="bg-gray-100 p-14">
        <p>Copyright © 2022 - Meknasi & Hala </p>
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
.hero {
  width: 100%;
  height: 100%;
  background-size: 100% 50%;
  background-repeat: no-repeat;
}
.qskd {
  display: flex;
  flex-direction: column;
}
</style>
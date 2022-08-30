<template>
<div>

    <div class="container text-center m-5">
      <h1>Sponsorizza il tuo annuncio</h1>
    </div>

    <div class="d-flex justify-content-center align-items-center container">
      
        <div class="d-flex card text-center m-2 lite">
            <h1>Lite</h1><span class="d-block">2,99 &euro;</span>
            <div class="mt-4"><p>Ottieni un posizionamento di rilievo per <strong>24h</strong></p></div>
        </div>
        <div class="d-flex card text-center m-2 plus">
            <h1>Plus</h1><span class="d-block sbarra">8,97 &euro;</span><span class="d-block">5,99 &euro;</span>
            <div class="mt-4"><p>Ottieni un posizionamento di rilievo per <strong>72h</strong></p></div>
        </div>
       
        <div class="d-flex card text-center m-2 gold">
            <h1>Gold</h1><span class="d-block sbarra">17,94 &euro;</span><span class="d-block">9,99 &euro;</span>
            <div class="mt-4"><p>Ottieni un posizionamento di rilievo per <strong>144h</strong></p></div>
        </div>
    </div>

  </div>
</template>

<script>
    export default {
        name: 'SponsorshipsComp'
    }
</script>

<style lang="scss" scoped>

body{
    background:#eee;
}

#scelto{
  bottom: 0;
  height: 30px;
  background-color: #EB594E;
}

.card {
  width: 350px;
  padding: 10px;
  border-radius: 20px;
  color: #fff;
  height: 350px;
  display: flex;
  position: relative;
  align-items: center;
  justify-content: center;
  transition: 0.5s;
}

.lite{
  color: #0e0e0e;
  background-color: #ffffff;
  border: solid 3px black;
}

.lite:hover, .plus:hover, .gold:hover{
  border: solid 3px #EB594E;
}

.plus{
  color: #404040;
  background-image: url(https://media.istockphoto.com/photos/abstract-metal-background-silver-gray-background-picture-id1287620067?b=1&k=20&m=1287620067&s=170667a&w=0&h=fZF45_nnF2owHwG11jRUcm8ibFirkUo1kZ1aozGJvCs=);
  background-position: top;
  background-size: cover;
  border: solid 3px black;
}

.gold{
  color: #404040;
  background-image: url(https://i.pinimg.com/originals/1e/c8/d2/1ec8d279aacf9eae231a6b9945b8bdd3.jpg);
  background-position: center;
  border: solid 3px black;
}


.card h1 {
  font-size: 48px;
  margin-bottom: 0px;
}

.card span {
  font-size: 28px;
}

.image {
  position: absolute;
  opacity: .1;
  left: 0;
  top: 0;
}

.image2 {
  position: absolute;
  bottom: 0;
  right: 0;
  opacity: .1;
}

.sbarra{
  text-decoration: line-through;
}

</style>

<template>
    <div class="container">
        <div class="row partner-section">
            <div class="col-12 text-center mb-3">
                <h2>I nostri <span class="orange-text">sponsor</span></h2>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col text-center partner-logo-container">
                <img class="partner-icon" src="../../../assets/airbnb.png" alt="">
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col text-center partner-logo-container">
                <img class="partner-icon" src="../../../assets/Lonely_Planet-Logo.png" alt="">
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col text-center partner-logo-container">
                <img class="partner-icon" src="../../../assets/hostelWorld.png" alt="">
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col text-center partner-logo-container">
                <img class="partner-icon" src="../../../assets/booking.png" alt="">
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: 'PartnerComp'
    }
</script>

<style lang="scss" scoped>

.partner-section{

    display: flex;
    align-items: center;

    margin: 30px 0;

    .partner-logo-container{

        margin-bottom: 15px;

        img{
            filter: grayscale(1);
            cursor: pointer;
            width: 150px;

            &:hover{
                filter: grayscale(0);
            }

        }
    }
}

</style>

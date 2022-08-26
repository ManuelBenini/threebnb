<template>
    <header class="header">
        <div class="logo-container">
            <img src="../../../assets/logo-threebnb-senza-scritta.png" alt="">
        </div>

        <div
          @click="showMenuLink"
          class="menu-section">

            <div class="hamburger-menu">
                <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="presentation" focusable="false" style="display: block; fill: none; height: 16px; width: 16px; stroke: currentcolor; stroke-width: 3; overflow: visible;"><g fill="none" fill-rule="nonzero"><path d="m2 16h28"></path><path d="m2 24h28"></path><path d="m2 8h28"></path></g></svg>
            </div>

            <div class="user-profile-pic">

                <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="presentation" focusable="false" style="display: block; height: 100%; width: 100%; fill: currentcolor;"><path d="m16 .7c-8.437 0-15.3 6.863-15.3 15.3s6.863 15.3 15.3 15.3 15.3-6.863 15.3-15.3-6.863-15.3-15.3-15.3zm0 28c-4.021 0-7.605-1.884-9.933-4.81a12.425 12.425 0 0 1 6.451-4.4 6.507 6.507 0 0 1 -3.018-5.49c0-3.584 2.916-6.5 6.5-6.5s6.5 2.916 6.5 6.5a6.513 6.513 0 0 1 -3.019 5.491 12.42 12.42 0 0 1 6.452 4.4c-2.328 2.925-5.912 4.809-9.933 4.809z"></path></svg>
            </div>

        </div>

        <div
         v-if="showNavLink"
         class="nav-link-menu">
            <nav>
                <ul>
                    <li>
                        <a href="">Accedi</a>
                    </li>
                    <li>
                        <a href="">Registrati</a>
                    </li>
                    <hr>
                    <li>
                        <a href="">Trova una stanza</a>
                    </li>
                </ul>
            </nav>
        </div>

    </header>
</template>

<script>
    export default {
        name: 'HeaderComp',

        data(){
            return{
                showNavLink: false,
            }
        },

        methods:{
            showMenuLink(){
                this.showNavLink = !this.showNavLink
            }
        }
    }
</script>

<style lang="scss" scoped>

.header{
    display: flex;
    justify-content: space-between;
    align-items: center;

    position: relative;

    height: 100px;
    width: 90%;
    margin: 0 auto;

    margin-top: 10px;
    // border: 1px dashed black;

    // Logo:
    .logo-container{

        width: 70px;
        // border: 1px dashed black;

        img{
            width: 100%;
        }
    }

    // Menu:
    .menu-section{

        display: flex;
        justify-content: center;

        padding: 5px;
        border-radius: 30px;

        width: 80px;
        border: 1px solid #dee2e6;

        background-color: white;

        cursor: pointer;

        &:hover{
            box-shadow: 0px 1px 1px 1px #dee2e6;
        }

        .hamburger-menu{
            display: flex;
            align-items: center;

            height: 30px;
            margin-right: 10px;

        }

        .user-profile-pic{
            width: 30px;
            height: 30px;
        }
    }

    //Link Modal:
    .nav-link-menu{
        position: absolute;
        right: 0px;
        top: 100px;

        width: 200px;
        height: 150px;
        border: 1px solid #dee2e6;
        border-radius: 10px;

        padding-top: 20px;

        background-color: white;
        box-shadow: 1px 1px 12px -5px #5b5a5a;

        nav{
            ul{


                li{
                    // border: 1px dashed black;
                    list-style: none;
                    margin-bottom: 7px;

                }
            }
        }


    }


}

</style>

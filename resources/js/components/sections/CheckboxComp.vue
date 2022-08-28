<template>
    <div>
        <div class="container-fluid">
            <div class="row">

                <div class="col d-flex justify-content-center align-items-center">

                    <ul v-for="(search, index) in advancedSearch" :key="`search${index}`">
                        <li>
                            <a class="" :href="search.href">
                                <i :class="search.icon"></i>
                                <p>{{ search.name }}</p>
                            </a>
                        </li>
                    </ul>

                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'CheckboxComp',

        data() {
    return {
      advancedSearch: [
        {
          name: 'Wi-Fi',
          href: '#',
          icon: 'fa-solid fa-wifi',
        },
        {
          name: 'Posto Macchina',
          href: '#',
          icon: 'fa-solid fa-square-parking',
        },
        {
          name: 'Piscina',
          href: '#',
          icon: 'fa-solid fa-person-swimming',
        },
        {
          name: 'Portineria',
          href: '#',
          icon: 'fa-solid fa-bell-concierge',
        },
        {
          name: 'Sauna',
          href: '#',
          icon: 'fa-solid fa-hot-tub-person',
        },
        {
          name: 'Vista Mare',
          href: '#',
          icon: 'fa-solid fa-house-flood-water',
        },
        {
          name: 'Aria Condizionata',
          href: '#',
          icon: 'fa-regular fa-snowflake',
        },
        {
          name: 'Camino',
          href: '#',
          icon: 'fa-solid fa-fire',
        },
        {
          name: 'Idromassaggio',
          href: '#',
          icon: 'fa-solid fa-bath',
        },
            ]
            }
        }
    }
</script>

<style lang="scss" scoped>

    ul {
        list-style: none;
    }

    li {
        margin: 0 2px;
        text-align: center;
        text-decoration: none;
        text-transform: none;
    }

    a {
        color: #979797;
        transition: color .2s ease-in-out;
        font-size: 18px;

        &:hover {
            transition: color .2s ease-in-out;
            text-decoration: none;
            -webkit-transition: color .2s ease-in-out;
            -moz-transition: color .2s ease-in-out;
            color: #000000;
        }

    }

    p {
        border-bottom: 2px solid transparent;
        padding-bottom: 3px;

        &:hover {
            border-bottom: 2px solid #979797;
            transition: border-color .2s ease-in-out;
        }
    }

</style>

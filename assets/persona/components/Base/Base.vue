<template>
    <div class="dashboard-main-wrapper">
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-dark fixed-top">
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav">
                        <li class="nav-item ">
                            <router-link :to="{ name: 'ListPerson' }" class="nav-link text-white"><i class="fa fa-home"></i> Inicio</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link :to="{ name: 'New' }" class="nav-link text-white"><i class="fa fa-user"></i> Persona
                            </router-link>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="dashboard-main-wrapper">
            <div class="dashboard-content col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <dashboard></dashboard>
            </div>
        </div>
    </div>
</template>

<script>
    import Dashboard from "../Dashboard/Dashboard";
    export default {
        components: {Dashboard},
        props: {},
    };
</script>

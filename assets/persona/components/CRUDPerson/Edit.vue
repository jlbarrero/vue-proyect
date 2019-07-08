<template>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Editar person</h5>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label class="col-form-label">Nombres</label>
                                <input type="text" class="form-control" v-model="person.nombres">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Sexo</label>
                                <input type="text" class="form-control" v-model="person.sexo">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Raza</label>
                                <input type="text" class="form-control" v-model="person.raza">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="col-form-label">Apellidos</label>
                                <input type="text" class="form-control" v-model="person.apellidos">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" placeholder="dd/mm/YYYY" v-model="person.fechaNac">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Salario</label>
                                <input type="text" class="form-control" v-model="person.salario">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="col-form-label">Edad</label>
                                <input type="text" class="form-control" v-model="person.edad">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">No. Identificación</label>
                                <input type="text" class="form-control" v-model="person.noId">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Cargo</label>
                                <input type="text" class="form-control" v-model="person.cargo">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Cantidad de Hijos</label>
                                <input type="text" class="form-control" v-model="person.cantHijos">
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button @click="editPerson()" type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Guardar</button>
                        <button type="button" class="btn btn-sm btn-danger" @click="$router.push({ name: 'ListPerson' })">
                            <i class="fa fa-close"></i> Cancelar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapState} from 'vuex'
    export default {
        name: 'Edit',
        computed: mapState([
            'person'
        ]),
        mounted: function () {
            this.$store.dispatch('getPerson', {id: this.$route.params.id})
        },
        methods: {
            editPerson() {
                this.$store.dispatch('editPerson', {person: this.person})
                this.$router.push({name: 'ListPerson'})
            }
        }
    }
</script>

<style scoped>

</style>
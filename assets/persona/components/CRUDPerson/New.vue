<template>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Adicionar person</h5>
            <div class="card-body">
                <form class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label class="col-form-label">Nombres</label>
                                <input type="text" class="form-control" v-model="person.nombres" required>
                                <div class="invalid-feedback">
                                    Inserte el nombre.
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Sexo</label>
                                <input type="text" class="form-control" v-model="person.sexo" required>
                                <div class="invalid-feedback">
                                    Inserte el sexo.
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Raza</label>
                                <input type="text" class="form-control" v-model="person.raza" required>
                                <div class="invalid-feedback">
                                    Inserte la raza.
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="col-form-label">Apellidos</label>
                                <input type="text" class="form-control" v-model="person.apellidos" required>
                                <div class="invalid-feedback">
                                    Inserte los apellidos.
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" v-model="person.fechaNac" required>
                                <div class="invalid-feedback">
                                    Inserte la fecha de nacimiento.
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Salario</label>
                                <input type="number" class="form-control" v-model="person.salario" required>
                                <div class="invalid-feedback">
                                    Inserte el salario.
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="col-form-label">Edad</label>
                                <input type="number" class="form-control" v-model="person.edad" required>
                                <div class="invalid-feedback">
                                    Inserte la edad.
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">No. Identificación</label>
                                <input type="text" class="form-control" v-model="person.noId" maxlength="11" minlength="11" required>
                                <div class="invalid-feedback">
                                    Inserte No. de Identificación.
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Cargo</label>
                                <input type="text" class="form-control" v-model="person.cargo" required>
                                <div class="invalid-feedback">
                                    Inserte el cargo.
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Cantidad de Hijos</label>
                                <input type="number" class="form-control" v-model="person.cantHijos" required>
                                <div class="invalid-feedback">
                                    Inserte la cantidad de hijos.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button @click="newPerson()" type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Guardar</button>
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

    export default {
        name: 'New',
        data() {
            return {
                person: {}
            }
        },
        methods: {
            newPerson() {
                this.$store.dispatch('newPerson', {person: this.person});
                this.$router.push({name: 'ListPerson'})
            }
        }
    }
</script>

<style scoped>

</style>
<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <form>
                            <input v-model="alumno.nombre" type="text" placeholder="Nombre" name="nombre" id="nombre">
                            <input v-model="alumno.apellido_paterno" placeholder="Ap Paterno" type="text" name="apellido_paterno" id="apellido_paterno">
                            <input v-model="alumno.apellido_materno" placeholder="Ap Materno" type="text" name="apellido_materno" id="apellid_materno">
                            <input v-model="alumno.sexo" type="text" placeholder="Sexo" name="sexo" id="sexo">
                            <input v-model="alumno.edad" type="number" placeholder="Edad" name="edad" id="edad">

                            <input type="button" value="Guardar" v-on:click="Evento" class="btn btn-info">
                        </form>
                        <div >
                            <ul class="list-group" v-for="alumno in lista_alumnos" :key="alumno.id">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{alumno.nombre}} {{alumno.apellido_paterno}} {{alumno.apellido_materno}} {{alumno.sexo}}
                                     <!-- <input type="button" value="Editar" v-on:click="Editar" class="btn btn-secondary"> -->
                                      <input type="button" value="Borrar" v-on:click="Borrar" class="btn btn-danger"> 
                                      <!-- <input type="button" value="Editar" v-on:click="Editar" class="btn btn-secondary">  -->
                                    <span class="badge badge-primary badge-pill">{{alumno.edad}}</span>

                                </li>
                                </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['alumnos'],
        mounted() {
            console.log(this.alumnos)
            this.lista_alumnos = JSON.parse(this.alumnos);
            console.log(this.lista_alumnos);
        },
        data() {
            return {
                lista_alumnos:null,
                 alumno: {
                 nombre: "",
                 apellido_paterno :"",
                 apellido_materno :"",
                 sexo : "",
                 edad : ""
                }
            }
        },

        methods : {
        Evento : function(){
            let self = this;
                axios.post('/datos', this.alumno)
            
            .then(function (response) {
                console.log(response);   
                self.lista_alumnos.push(response.data)

            })
            .catch(function (error) {
                console.log(error);
            });
                    },

          //BORRAR ASINCRONO          
                    
        Borrar : function(){
            let self = this;
            // axios.delete('/info', this.alumno)

            //   .then(function (response) {
            //     console.log(response);   
               this.lista_alumnos.pop(this.lista_alumnos)

        

            // })
            // .catch(function (error) {
            //     console.log(error);
            // });
                    }
            //         

            // Editar : function(){
            //     this.lista_alumnos.splice(1,1,"Uno")
            // }

    }
    }

    
  
</script>

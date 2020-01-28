<template>
  <div class="container">
    <div class="card-body">
                         <form id="form"> 
                            <input v-model="persona.nombre" type="text" placeholder="Nombre" name="nombre" id="nombre">
                            <input v-model="persona.apellido_paterno" placeholder="Ap Paterno" type="text" name="apellido_paterno" id="apellido_paterno">
                            <input v-model="persona.apellido_materno" placeholder="Ap Materno" type="text" name="apellido_materno" id="apellid_materno">
                            <input v-model="persona.sexo" type="text" placeholder="Sexo" name="sexo" id="sexo">
                            <input v-model="persona.edad" type="number" placeholder="Edad" name="edad" id="edad">

                            <input type="button" v-on:click="agregar" value="Guardar" class="btn btn-info">
                        </form>
                        </div>  
      <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido Paterno</th>
      <th scope="col">Apellido Materno</th>
      <th scope="col">Sexo</th>
      <th scope="col">Edad</th>
      <th scope="col">Acción</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="persona in personas" v-bind:key="persona.id">
      <td>{{persona.id}}</td>
      <td>{{persona.nombre}}</td>
      <td>{{persona.apellido_paterno}}</td>
      <td>{{persona.apellido_materno}}</td>
      <td>{{persona.sexo}}</td>
      <td>{{persona.edad}}</td> 
      <td><button type="button" v-on:click="borrar(persona.id)" class="btn btn-danger">Borrar</button></td> 
      <td><button type="button" v-on:click="editar(persona)" class="btn btn-secondary">Editar</button></td>   
    </tr>
  </tbody>
</table>
  </div>
</template>

<script>

export default {
  
  name: 'tabla-dos',
  mounted(){
    console.log('montado');
   
  },
 
 data() {
     return {
               personas: [],

               persona: {
                 id: "",
                 nombre: "",
                 apellido_paterno: "",
                 apellido_materno: "",
                 sexo: "",
                 edad: ""
               },

               persona_id: "",
               modoEditar: false

            }
        },

        created(){
          this.traer();
        },

        methods: {
        
        traer(){
          fetch('api/personas')
          
           .then(Response => Response.json())  
           .then(Response => {
             
             this.personas = Response.data;
             console.log(this.personas);
           })
          //  .then(Response => {
          //    this.personas = Response.data;
          //   });
        
        },

        borrar(id) {

         
          fetch(`api/persona/${id}`, {
            method: 'delete'
            })

         // .then(Response => Response.json())
          .then(data => {
         
          this.traer();
          })
        
          },

          agregar(id){

            //  let self = this;
              if (this.modoEditar === false){
             fetch('api/persona' , {
               method : 'post',
              headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json;charset=UTF-8'
                  },
               body : JSON.stringify(this.persona)
             })
             
              .then(data => {

                 this.persona.nombre = "";
            this.persona.apellido_paterno = "";
            this.persona.apellido_materno = "";
            this.persona.sexo = "";
            this.persona.edad = "";
            this.modoEditar = false;
                this.traer();
              })
           
            console.log(this.persona)

          } else {

            console.log(this.modoEditar);

               fetch('api/persona' , {
               method : 'put',
              headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json;charset=UTF-8'
                  },
               body : JSON.stringify(this.persona)
             })

              .then(Response => Response.json())  
              .then(data => {

                 this.persona.nombre = "";
            this.persona.apellido_paterno = "";
            this.persona.apellido_materno = "";
            this.persona.sexo = "";
            this.persona.edad = "";
            this.modoEditar = false;
                this.traer();
              })
              
              
              console.log(this.persona.nombre);
              console.log(this.persona.id);
             
          
            //  .then(self.personas.push(Response.data))
           
            //  .then(data => this.traer())
            //  console.log(this.persona.nombre)
             // console.log(this.persona)


          }
          
          },

          editar(persona){

            this.modoEditar = true;
            this.persona.id = persona.id;
            this.persona.persona_id = persona.id;
            this.persona.nombre = persona.nombre;
            this.persona.apellido_paterno = persona.apellido_paterno;
            this.persona.apellido_materno = persona.apellido_materno;
            this.persona.sexo = persona.sexo;
            this.persona.edad = persona.edad;
            console.log(this.modoEditar);
            console.log(this.persona.id);
           

          }
        }
        
}

  
  



      

        
       


</script>

<style lang="stylus" scoped>

</style>


 
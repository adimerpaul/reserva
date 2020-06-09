<template>
    <div class="container">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success m-2" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-users-cog"></i> Crear Especialidad
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Crear especialidad</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="Guardar">
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-10">
                                    <input type="text" v-model="specialty.name" class="form-control" id="name" placeholder="Name" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-trash"></i> Cancelar</button>
                                <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Crear </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <table class="table">
            <tr>
                <th>Id</th>
                <th>name</th>
                <th>options</th>
            </tr>
            <tr v-for="(item,index) in specialtys" :key="index">
                <td>{{item.id}}</td>
                <td>{{item.name}}</td>
                <td>
                    <button type="button" class="btn btn-warning p-1 m-0" data-toggle="modal" data-target="#update" @click="datact(item)"><i class="fa fa-edit"></i> Actuali</button>
                    <button class="btn btn-danger p-1 m-0" @click="Borrar(item.id)"><i class="fa fa-trash"></i> Borrar</button>
                </td>
            </tr>
        </table>


        <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="updateLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateLabel">Actualizar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="Modificar">
                            <div class="form-group row">
                                <label for="name2" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" v-model="specialty.name" class="form-control" id="name2" placeholder="Name" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-trash"></i> Cancelar</button>
                                <button type="submit" class="btn btn-warning"><i class="fa fa-plus"></i> Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import $ from 'jquery';

    export default {
        created(){
        },
        data(){
            return {
                specialty:{},
                specialtys:[],
            }
        },
        mounted() {
            this.datos();
        },
        methods:{
            Guardar(){
                axios.post('/specialtys',this.specialty).then(res=>{
                    // console.log(res);
                    $('#exampleModal').modal('hide');
                    this.datos();
                    this.specialty={};
                });
            },
            datos(){
                this.doctors=[];
                axios.get('/specialtys').then(res=>{
                    this.specialtys=res.data;
                });
            },
            Borrar(id){
                // console.log(id);
                if (confirm("Seguro de eliminar?")){
                    axios.delete('/specialtys/'+id).then(res=>{
                        // console.log(res.data)
                        if (res.data==0){
                            alert("No se puede borrar por que el doctor esta en una reserva")
                        }else{
                            this.datos();
                        }

                    });
                }

            },
            datact(item){
                this.specialty=item;
            },
            Modificar(){
                axios.put('/specialtys/'+this.specialty.id,this.specialty).then(res=>{
                    // console.log(res);
                    $('#update').modal('hide');
                    this.datos();
                    this.specialty={};
                })
            }
        }
    }
</script>

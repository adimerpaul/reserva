<template>
    <div class="container">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success m-2" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-users-cog"></i> Crear Especialidad
        </button>
<!--        <input type="color" v-model="specialty.color">-->
<!--        {{specialty}}-->
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus-circle"></i> Crear especialidad</h5>
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
                                <label for="color" class="col-sm-2 col-form-label">Color</label>
                                <div class="col-sm-10">
                                    <input type="color" v-model="specialty.color" class="form-control" id="color" placeholder="Color" required>
                                </div>
                                <label for="descripcion" class="col-sm-2 col-form-label">Descripcion</label>
                                <div class="col-sm-10">
                                    <input type="text" v-model="specialty.descripcion" class="form-control" id="descripcion" placeholder="Descripcion" required>
                                </div>
                                <label for="file" class="col-sm-2 col-form-label">Fotografia</label>
                                <div class="col-sm-5">
                                    <input type="file" @change="subirfoto"  class="form-control" id="file" placeholder="Color" required>
                                </div>
                                <div class="col-sm-5">
                                    <img src="img/virus.png" id="avatar" alt="" width="70">
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
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Estado</th>
                <th>Foto</th>
                <th>Color</th>
                <th>Options</th>
            </tr>
            <tr v-for="(item,index) in specialtys" :key="index">
                <td>{{item.id}}</td>
                <td>{{item.name}}</td>
                <td>{{item.descripcion}}</td>
                <td><div class="badge" v-bind:class="item.estado=='ACTIVO'?'badge-success':'badge-warning'">{{item.estado}}</div></td>
                <td><img v-bind:src="'app/specialities/' + item.id+'.jpg'" width="25" /> </td>
                <td> <div class="bg text-center" :style="{background:item.color}">Color</div></td>
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
                                <label for="color2" class="col-sm-2 col-form-label">Color</label>
                                <div class="col-sm-10">
                                    <input type="color" v-model="specialty.color" class="form-control" id="color2" placeholder="Color" required>
                                </div>
                                <label for="descripcion2" class="col-sm-2 col-form-label">Descripcion</label>
                                <div class="col-sm-10">
                                    <input type="text" v-model="specialty.descripcion" class="form-control" id="descripcion2" placeholder="Descripcion" required>
                                </div>
                                <label for="estado2" class="col-sm-2 col-form-label">Estado</label>
                                <div class="col-sm-10">
<!--                                    <input type="text" v-model="specialty.estado" class="form-control" id="estado2" placeholder="Descripcion" required>-->
                                    <select name="estad" id="estado2" class="form-control" v-model="specialty.estado" required>
                                        <option value="ACTIVO">ACTIVO</option>
                                        <option value="INACTIVO">INACTIVO</option>
                                    </select>
                                </div>
                                <label for="file2" class="col-sm-2 col-form-label">Fotografia</label>
                                <div class="col-sm-5">
                                    <input type="file" @change="subirfoto2"  class="form-control" id="file2" placeholder="Fotografia">
                                </div>
                                <div class="col-sm-5">
                                    <img id="avatar2" alt="" width="70" v-bind:src="'app/specialities/'+specialty.id+'.jpg'">
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
            subirfoto:function(){
              // alert('aa') ;
                $('#avatar').attr('src','/img/virus.png');
                let data = new FormData();
                data.append('file', document.getElementById('file').files[0]);
                axios.post('/subir',data).then((res)=>{
                    // alert('a');
                    $('#avatar').attr('src','/app/'+res.data)
                });
                return false;
                e.preventDefault();
            },
            subirfoto2:function(){
                // alert('aa') ;
                $('#avatar2').attr('src','/img/virus.png');
                let data = new FormData();
                data.append('file', document.getElementById('file2').files[0]);
                axios.post('/subir',data).then((res)=>{
                    // alert('a');
                    $('#avatar2').attr('src','/app/'+res.data)
                });
                return false;
                e.preventDefault();
            },
            Guardar(){
                // console.log(this.specialty)
                let data = new FormData();
                data.append('file', document.getElementById('file').files[0]);
                data.append('name',this.specialty.name)
                data.append('descripcion',this.specialty.descripcion)
                data.append('color',this.specialty.color)
                axios.post('/specialtys',data).then(res=>{
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
                // console.log(this.specialty);
            },
            Modificar(){
                let data = new FormData();
                data.append('file', document.getElementById('file2').files[0]);
                data.append('name',this.specialty.name)
                data.append('descripcion',this.specialty.descripcion)
                data.append('color',this.specialty.color)
                data.append('estado',this.specialty.estado)
                axios.post('/specialtyUpdate/'+this.specialty.id,data).then(res=>{
                    // console.log(res);
                    $('#update').modal('hide');
                    this.datos();
                    this.specialty={};
                })
            }
        }
    }
</script>

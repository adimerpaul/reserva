<template>
    <div class="container">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success m-2" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-users-cog"></i> Crear doctor
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="Guardar">
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" v-model="doctor.name" class="form-control" id="name" placeholder="Name" required>
                                </div>
                                <label for="file" class="col-sm-2 col-form-label">Imagen</label>
                                <div class="col-sm-5">
                                    <input type="file"  class="form-control" id="file" placeholder="Imagen" required>
                                </div>
                                <div class="col-sm-5">
                                    <img src="img/logo.png" width="100" id="avatar" alt="">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-trash"></i> Cancelar</button>
                                <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Crear Abogado</button>
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
                <th>Imagen</th>
                <th>options</th>
            </tr>
            <tr v-for="(item,index) in doctors" :key="index">
                <td>{{item.id}}</td>
                <td>{{item.name}}</td>
                <td><img v-bind:src="'app/doctors/' + item.id+'.jpg'" width="25" /> </td>
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
                                    <input type="text" v-model="doctor.name" class="form-control" id="name2" placeholder="Name" required>
                                </div>
                                <label for="file2" class="col-sm-2 col-form-label">Imagen</label>
                                <div class="col-sm-5">
                                    <input type="file"  class="form-control" id="file2" @change.prevent="photoact" placeholder="Imagen" >
                                </div>
                                <div class="col-sm-5">
                                    <img v-bind:src="'app/doctors/' + doctor.id+'.jpg'"  width="100" id="avatar2" alt="">
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
    // $(document).ready(function() {
    //     $('#example').DataTable();
    // } );
    export default {
        created(){
            // $('#example').DataTable();

        },
        data(){
          return {
              doctor:{},
              doctors:[],

          }
        },
        mounted() {
            // console.log('doctor mounted.');
            // window.onload=function () {
            //     $('#example').DataTable();
            // }
            this.datos();
            $('#file').change(function (e) {
                $('#avatar').attr('src','/img/logo.png');
                // console.log(this);
                let data = new FormData();
                data.append('file', document.getElementById('file').files[0]);
                // console.log(data);
                axios.post('/subir',data).then((res)=>{
                        // console.log(res.data)
                    $('#avatar').attr('src','/app/'+res.data)
                });
                return false;
                e.preventDefault();
            });

            // $('#update').on('show.bs.modal', function (event) {
            //     var button = $(event.relatedTarget) // Button that triggered the modal
            //     var recipient = button.data('whatever') // Extract info from data-* attributes
            //     // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            //     // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            //     var modal = $(this)
            //     modal.find('.modal-title').text('New message to ' + recipient)
            //     modal.find('.modal-body input').val(recipient)
            // })
        },
        methods:{
            Guardar(){
                let data = new FormData();
                data.append('file', document.getElementById('file').files[0]);
                data.append('name',this.doctor.name)
                axios.post('/doctors',data).then(res=>{
                   // console.log(res);
                    $('#exampleModal').modal('hide');
                    this.datos();
                    this.doctor={};
                });
            },
            datos(){
                this.doctors=[];
                axios.get('/doctors').then(res=>{
                    this.doctors=res.data;
                });
            },
            Borrar(id){
                // console.log(id);
                if (confirm("Seguro de eliminar?")){
                    axios.delete('/doctors/'+id).then(res=>{
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
                this.doctor=item;
            },
            Modificar(){
                // let data = new FormData();
                // data.append('file', document.getElementById('file2').files[0]);
                // data.append('name',this.doctor.name)
                // this.doctors.file=document.getElementById('file2').file[0];
                axios.put('/doctors/'+this.doctor.id,this.doctor).then(res=>{
                    // console.log(res);
                    $('#update').modal('hide');
                    this.datos();
                    this.doctor={};
                })
            },
            photoact(e){
                // console.log('asdas');
                // console.log(e.files[0]);
                let data = new FormData();
                data.append('file',document.getElementById('file2').files[0]);
                data.append('id',this.doctor.id);
                $('#avatar2').attr('src','/img/logo.png');
                axios.post('/actphoto',data).then(res=>{
                    // console.log(res.data)
                    // this.doctor.id=res.data;
                    document.getElementById('avatar2').src="app/"+res.data;
                    this.datos();
                })
            }
        }
    }
</script>

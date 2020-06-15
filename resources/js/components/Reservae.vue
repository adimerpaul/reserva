<template>

    <div class="container">
        <!-- Modal -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"> <i class="fa fa-clock"></i> Horarios disponibles</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="grid2">
                            <div v-for="(item, index) in reservations" :key="index" >
                                <div class="card mb-3" style="max-width: 18rem;">
                                    <div class="card-header text-center text-white bg-dark">Jueves 20 de octubre</div>
                                    <div >
                                        <ul class="eventos" >
                                            <li v-for="dat in item.datos">
                                                {{dat.hora}}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            {{reservations}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fa fa-eye"></i> Ocultar</button>
<!--                        <button type="button" class="btn btn-primary">Save changes</button>-->
                    </div>
                </div>
            </div>
        </div>
<!--        <div class="row">-->
            <div class="grid" >
                <div v-for="(item,index) in especialidades" :key="index" class="card-small">
                    <p class="card-small-views">
                        <b>{{item.name}}</b>
                    </p>
                    <p class="card-small-icon">
                        <img v-bind:src="'app/specialities/'+item.id+'.jpg'" width="70">
                    </p>
                    <p class="card-foo">{{item.descripcion}}</p>
                    <p class="card-btn">
                        <button class="btn btn-sm btn-dark" @click="Search(item)" data-toggle="modal" data-target="#exampleModalLong"><i class="fa fa-clock"></i> Reservar</button>
                    </p>
                </div>
            </div>
<!--        </div>-->
    </div>
</template>

<script>
    export default {
        data(){
          return {
              especialidades:[],
              reservations:[
                  {fecha:'01/01/2000',datos:[ {hora:'8:00 am a 10:00 am'}, {hora:'8:00 am a 10:00 am'}, {hora:'8:00 am a 10:00 am'} ]},
                  {fecha:'02/01/2000'},
                  {fecha:'03/01/2000'},
                  {fecha:'04/01/2000'}
                  ],
          }
        },
        mounted() {
            // console.log('reserva especialidad mounted.')
            axios.get('/specialtys').then(res=>{
                // this.especialidades=res.data;
                // this.especialidades.forEach(res=>{
                //     // this.especialidades.descripcion="aaa";
                //     console.log();
                // })
                res.data.forEach(res=>{
                    // console.log(res);
                    if (res.estado=='ACTIVO') {
                        this.especialidades.push(res);
                    }
                    // console.log();
                });
                // console.log(this.especialidades);
            })
        },
        methods:{
            Search(item){
                // console.log(item.id)
                axios.get('/reservation').then(res=>{
                    // console.log(res)
                    // this.reservations=[];
                    res.data.forEach(dat=>{
                        if (dat.specialty_id==item.id){
                            // console.log( moment(dat.start).format('YYYY-MM-DD') );
                            let fecha=moment(dat.start).format('YYYY-MM-DD');
                            // this.reservations.push(dat);
                            const found=this.reservations.findIndex(e=>e.fecha==fecha);
                            console.log(found);
                            // if(found==-1){
                            //     this.reservations.push({fecha:fecha})
                            // }else {
                            //     // this.reservations.fecha.push({fecha:fecha})
                            //
                            // }
                        }
                    })

                });
            }
        }
        // created() {
        //
        // }
    }
</script>
<style>
    .eventos{
        padding: 0px;
        margin: 0px;
        list-style: none;
    }
    .eventos li{
        color: black;
        margin: 0px;
        padding: 0px;
        border: 1px solid #D0D0D0;
        font-size: 0.9em;
        margin-top: 10px;
        text-align: center;
    }
    .eventos li:hover{
        background: rgba(0,0,0,0.7);
        color: white;
    }
    .card-small {
        /* border: 1px solid red; */
        display: grid;
        grid-template-columns: 1fr 1fr;
        /*grid-row-gap: 0em;*/
        border:1px solid #D0D0D0;
        border-radius: 8px;
        padding: 1em;
    }
    .card-small p {
        margin: 0;
        padding: 0;
    }
    .card-small-views {
         /*border: 1px solid green;*/
        /*font-weight: bold;*/
        font-size: .9em;
    }
    .card-small-icon {
        /*border: 1px solid orange;*/
        text-align: right;
    }
    .card-small-icon img{
        border-radius:50%;
        border: 3px solid #D0D0D0;
    }
    .card-foo{
        /*border: 1px solid blue;*/
        grid-column-start: 1;
        grid-column-end: 3;
        border-bottom: 1px solid #D0D0D0;
    }
    .card-btn{
        /*margin: 100px;*/
        /*padding: 100px;*/
        /*border:1px solid blue;*/
        padding-top: 10em;
        /*margin-top: 10em;*/
        text-align: center;
        grid-column-start: 1;
        grid-column-end: 3;
    }
    .card-btn button{
        margin-top: 0.2em;
        /*color: red;*/
    }
    .grid {
        display: grid;
        grid-gap: 1em;
    }
    .grid2 {
        display: grid;
        grid-gap: 1em;
    }
    @media screen and (min-width: 480px) {
        .grid {
            grid-template-columns: 1fr 1fr;
        }
        .grid2 {
            grid-template-columns: 1fr 1fr;
        }
        /*.wrapper {*/
        /*    max-width: 1440px;*/
        /*    margin: auto;*/
        /*}*/
    }

    @media screen and (min-width: 768px) {
        .grid {
            grid-template-columns: 1fr 1fr 1fr;
        }
        .grid2 {
            grid-template-columns: 1fr 1fr ;
        }
    }

    @media screen and (min-width: 1024px) {
        .grid {
            grid-template-columns: 1fr 1fr 1fr 1fr;
        }
        .grid2 {
            grid-template-columns: 1fr 1fr 1fr 1fr;
        }
        /*.header-total {*/
        /*    border: none;*/
        /*}*/
        /*.header-grid {*/
        /*    display: grid;*/
        /*    grid-template-columns: 1fr 200px;*/
        /*}*/
    }
</style>

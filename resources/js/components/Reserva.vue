<style>
    .vue-select-image__lbl{
        font-size: 15px;
        font-weight: bold;

    }
    #calendar {
        /*max-width: 900px;*/
        margin: 0 auto;
    }
</style>
<template>
    <div class="container">
        <!-- Button trigger modal -->
        <div class="row mb-1">
            <div class="col-sm-1">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-plus-circle"></i> Crear
                </button>
<!--                <button class="btn btn-dark" @click="eli">click</button>-->
            </div>
            <div class="col-sm-11" >
                <button  type="button" @click="All" class="btn btn-dark">
                    Todos
                </button>
                <button v-for="(item,index) in specialtys" :key="index" :style="{background:item.color,color:'black'}" @click="ShowEs(item)"  type="button" class="btn p-0 m-0">
                    {{item.name}}
                </button>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="show" tabindex="-1" role="dialog" aria-labelledby="showLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="showLabel"><i class="fa fa-edit"></i> Reserva</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group row">
                                <label for="titulo" class="col-sm-2 col-form-label">Titulo</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="titulo" v-model="evento.title">
                                </div>
                                <label for="inicio" class="col-sm-2 col-form-label">Inicio</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="inicio" v-model="evento.start">
                                </div>
                                <label for="fin" class="col-sm-2 col-form-label">Fin</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="fin" v-model="evento.end">
                                </div>
                            </div>
                            {{evento}}
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-eye"></i> Ocultar</button>
                        <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-plus-circle"></i> Nuevas reservas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form  @submit.prevent="Create">
                            <div class="form-group row">
                                <vue-select-image h="50" :useLabel="true"  :dataImages="dataImages" @onselectimage="onSelectImage">
                                </vue-select-image>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-1 col-form-label">Espec.</label>
                                <div class="col-sm-5">
<!--                                    <v-select :options="options"></v-select>-->
                                    <v-select :options="options" label="title" v-model="selected">
                                        <template #search="{attributes, events}">
                                            <input
                                                class="vs__search"
                                                :required="!selected"
                                                v-bind="attributes"
                                                v-on="events"
                                            />
                                        </template>
                                    </v-select>

                                </div>
                                <label  class="col-sm-1 col-form-label">Inicio</label>
                                <div class="col-sm-2">
                                    <input type="time" class="form-control" v-model="horainicio">
                                </div>
                                <label  class="col-sm-1 col-form-label">Final</label>
                                <div class="col-sm-2">
                                    <input type="time" class="form-control" v-model="horafinal">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Fecha Inicio</label>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control" v-model="fecha1">
                                </div>
                                <label  class="col-sm-2 col-form-label">Fecha Final</label>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control" v-model="fecha2">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-trash"></i> Cancelar</button>
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check-circle"></i> Guardar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div id='calendar'></div>

    </div>
</template>

<script>
    import moment from "moment";
    import $ from "jquery";
    import FullCalendar from '@fullcalendar/vue'
    import dayGridPlugin from '@fullcalendar/daygrid'
    import timeGridPlugin from '@fullcalendar/timegrid'
    import interactionPlugin from '@fullcalendar/interaction'

    export default {
        components: {
            FullCalendar // make the <FullCalendar> tag available
        },
        data(){
            return {
                options: [
                    // 'foo',
                    // 'bar',
                    // 'baz'
                ],
                reservation:[],
                doctors:[],
                evento:{title:'aaa'},
                specialtys:[],
                especialidad:'',
                iddoctor:0,
                selected:false,
                horainicio:'10:00',
                horafinal:'10:30',
                calendar:'',
                fecha1:moment().format('YYYY-MM-DD'),
                fecha2:moment().add(6,'days').format('YYYY-MM-DD'),
                dataImages:[]
            }
        },
        computed: {
            // seleccionado:function(){
            //     // console.log(this.especialidad.length);
            //     // if (this.especialidad.length == 0 && this.especialidad!=null){
            //     //     return true;
            //     // }else{
            //     //     return false;
            //     // }
            // }
        },
        mounted: function () {

            // console.log(moment().format());

            // console.log();
            axios.get('./specialtys').then(res => {
                this.specialtys = res.data;
                this.specialtys.forEach(res => {
                    // console.log(res.name);
                    // res.name="";
                    this.options.push({title: res.name, code: res.id});
                });
            });
            axios.get('./reservation').then(res => {
                // console.log(res.data);
                this.reservation = res.data;
                // var calendarEl = document.getElementById('calendar');
                // this.calendar = new FullCalendar.Calendar(calendarEl, {
                //     plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
                //     header: {
                //         left: 'prev,next today',
                //         center: 'title',
                //         right: 'dayGridMonth,timeGridWeek'//,timeGridDay,listWeek'
                //     },
                //     defaultDate: moment().format('YYYY-MM-DD'),
                //     navLinks: true, // can click day/week names to navigate views
                //     defaultView: 'timeGridWeek',
                //     weekNumbers: true,
                //     weekNumbersWithinDays: true,
                //     weekNumberCalculation: 'ISO',
                //     locale: 'es',
                //     editable: false,
                //     eventLimit: true, // allow "more" link when too many events
                //     events: this.reservation,
                //     eventClick: function (info) {
                //         $('#show').modal('show');
                //         // this.recuperar(info);
                //         this.evento.title = "bbbb";
                //     }
                //
                // });
                // this.calendar.render();

            })
            axios.get('/doctors').then(res => {
                // console.log(res);
                res.data.forEach(res => {
                    // console.log(res.name);
                    this.dataImages.push({
                        id: res.id,
                        src: '/app/doctors/' + res.id + '.jpg',
                        alt: res.name.substring(0, 10)
                    });
                });
            })
        },
        methods:{
            recuperar:function(info){
                console.log(info)
            },
            eli: async function () {
                // let event = this.calendar.getEventById('2');
                // alert("Are You Remove Event "+event.title);
                // event.remove();

                // var eventSources = this.calendar.getEventSources();
                //
                // var len = eventSources.length;
                // for (var i = 0; i < len; i++) {
                //     await eventSources[i].remove();
                //     console.log('a');
                // }
                // this.calendar.removeAllEvents();
                // this.calendar.addEvent({
                //     id: 45,
                //     title: "Doc: Anacleto valle copa Esp. Ginecología y obstetricia",
                //     start: "2020-06-09 10:00:00",
                //     end: "2020-06-09 10:30:00",
                //     // allDay: true
                // });
                // toastr.info('Creando reservas!');
            },
            onSelectImage: function (data) {
                // console.log('fire event onSelectImage: ', data.id)
                this.iddoctor=data.id
                // this.imageSelected = data
            },
            ShowEs:function(item){

                this.calendar.removeAllEvents();
                axios.get('./reservation').then(res=>{
                    res.data.forEach(res=>{
                        if (res.specialty_id==item.id){
                            this.calendar.addEvent({
                                id: res.id,
                                title: res.title,
                                start: res.start,
                                end: res.end,
                                color:res.color
                            });
                        }
                    });
                    // this.$loading(false);
                });
            },
            All:function(){
                this.$loading(true);
                this.calendar.removeAllEvents();
                axios.get('./reservation').then(res=>{
                    res.data.forEach(res=>{
                        // if (res.id==item.id){
                            this.calendar.addEvent({
                                id: res.id,
                                title: res.title,
                                start: res.start,
                                end: res.end,
                                color:res.color
                            });
                        // }
                    });
                    this.$loading(false);
                });
            },
            Create: async function () {
                $('#exampleModal').modal('hide');
                toastr.info('Se estan creando las reservas!');
                this.$loading(true);
                // console.log('a');

                if (this.fecha2 >= this.fecha1 && moment(this.horafinal, 'HH:mm') > moment(this.horainicio, 'HH:mm') && this.iddoctor != "") {
                    // console.log(moment(this.horainicio, 'HH:mm').format('HH:mm:ss'));
                    let f1 = moment(this.fecha1, 'YYYY-MM-DD');
                    let f2 = moment(this.fecha2, 'YYYY-MM-DD');
                    let diffdias = f2.diff(f1, 'days');
                     for (let i = 0; i <= diffdias; i++) {
                        // console.log(f1.format('YYYY-MM-DD'));
                        //  console.log(this.selected.code);
                        let datos = {
                            start: f1.format('YYYY-MM-DD')+' '+moment(this.horainicio, 'HH:mm').format('HH:mm:ss'),
                            end: f1.format('YYYY-MM-DD')+' '+moment(this.horafinal, 'HH:mm').format('HH:mm:ss'),
                            doctor_id: this.iddoctor,
                            specialty_id: this.selected.code
                        };
                        await axios.post('/reservation', datos).then(res => {
                            // console.log(res.data);
                            // this.calendar.removeAllEvents();
                            // this.calendar.addEvent({
                            //     id: 45,
                            //     title: "Doc: Anacleto valle copa Esp. Ginecología y obstetricia",
                            //     start: "2020-06-09 10:00:00",
                            //     end: "2020-06-09 10:30:00"
                            //     // allDay: true
                            // });
                            // res.data.forEach(res=>{
                            //     // this.calendar.addEvent({
                            //     //     id: 45,
                            //     //     title: "Doc: Anacleto valle copa Esp. Ginecología y obstetricia",
                            //     //     start: "2020-06-09 10:00:00",
                            //     //     end: "2020-06-09 10:30:00"
                            //     //     // allDay: true
                            //     // });
                            //     console.log(res);
                            // });
                        })
                        f1.add(1, "days");
                    }
                    axios.get('./reservation').then(res=>{
                        // console.log(res.data);
                        this.calendar.removeAllEvents();
                        res.data.forEach(res=>{
                            this.calendar.addEvent({
                                id: res.id,
                                title: res.title,
                                start: res.start,
                                end: res.end,
                                color:res.color
                                // allDay: true
                            });
                            // console.log(res);
                        });
                        this.$loading(false);
                    });
                    // while (f1!=f2){
                    //     f1.add(1,"days");
                    //     console.log(f1.format('YYYY-MM-DD'));
                    // }
                    // axios.post('/reservation',datos).then(res=>{
                    //     console.log(res);
                    // })
                } else {
                    alert('Error al seleccionar datos');
                }
            }

        },
        watch: {
            horainicio: function (val) {
                var hora =moment (val, 'HH:mm');
                hora.add(30, 'minutes');
                // moment().format('MMMM Do YYYY, h:mm:ss a');
                this.horafinal = hora.format('HH:mm') ;
            },
        }
    }
</script>

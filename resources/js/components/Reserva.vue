<style>
    .vue-select-image__lbl{
        font-size: 1;
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
        <button type="button" class="btn btn-success m-2" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-plus-circle"></i> Crear nueva reservas
        </button>
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
                                <vue-select-image  :useLabel="true"  :dataImages="dataImages" @onselectimage="onSelectImage">
                                </vue-select-image>

                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Especialidad</label>
                                <div class="col-sm-10">
<!--                                    <v-select :options="options"></v-select>-->
                                    <v-select :options="options" label="title" v-model="especialidad">
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
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Hora Inicio</label>
                                <div class="col-sm-4">
                                    <input type="datetime-local" >
                                </div>
                                <label  class="col-sm-2 col-form-label">Hora Inicio</label>
                                <div class="col-sm-4">
                                    <input type="datetime-local" >
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
    export default {
        data(){
            return {
                options: [
                    'foo',
                    'bar',
                    'baz'
                ],
                reservation:[],
                doctors:[],
                specialtys:[],
                especialidad:'',
                dataImages:[
                // {
                //     id: '1',
                //     src: 'https://unsplash.it/50?random',
                //     alt: 'Alt Image 1'
                // }, {
                //     id: '2',
                //     src: 'https://unsplash.it/50?random',
                //     alt: 'Alt Image 2'
                // }, {
                //     id: '3',
                //     src: 'https://unsplash.it/50?random',
                //     alt: 'Alt Image 3'
                // }, {
                //     id: '4',
                //     src: 'https://unsplash.it/50?random',
                //     alt: 'Alt Image 4'
                // }
                ]
            }
        },
        mounted() {
            // console.log();
            axios.get('./especialtys',res=>{
                console.log(res);
            });
            axios.get('./reservation').then(res=>{
                // console.log(res.data);
                this.reservation=res.data;
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek'//,timeGridDay,listWeek'
                    },
                    defaultDate: moment().format('YYYY-MM-DD'),
                    navLinks: true, // can click day/week names to navigate views
                    defaultView:'timeGridWeek',
                    weekNumbers: true,
                    weekNumbersWithinDays: true,
                    weekNumberCalculation: 'ISO',
                    locale:'es',
                    editable: false,
                    eventLimit: true, // allow "more" link when too many events
                    events: this.reservation
                });
                calendar.render();

            })
            axios.get('/doctors').then(res=>{
                // console.log(res);
                res.data.forEach(res=>{
                    // console.log(res);
                    this.dataImages.push({
                        id: res.id,
                        src: '/app/doctors/'+res.id+'.jpg',
                        alt: res.name.substring(0,10)
                    });
                });
            })
        },
        methods:{
            onSelectImage: function (data) {
                console.log('fire event onSelectImage: ', data.id)
                // this.imageSelected = data
            }
        }
    }
</script>

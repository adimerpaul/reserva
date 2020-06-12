<template>

    <div class="container">
<!--        <div class="row">-->
            <div class="grid" >
                <div class="card-small">
                    <p class="card-small-views">
                        <b>Especialidad</b><br>
                        Lorem ipsum.
                    </p>
                    <p class="card-small-icon">
                        <img src="app/doctors/1.jpg" width="70">
                    </p>
                    <p></p>
                </div>

            </div>
<!--        </div>-->
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('reserva especialidad mounted.')
        }
    }
</script>
<style>
    .card-small {
        /* border: 1px solid red; */
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-row-gap: 1em;
        border:1px solid #D0D0D0;
        border-radius: 8px;
        padding: 1.7em;
    }
    .card-small p {
        margin: 0;
        padding: 0;
    }
    .card-small-views {
        /* border: 1px solid green; */
        /*font-weight: bold;*/
        font-size: .9em;
    }
    .card-small-icon {
        /* border: 1px solid orange; */
        text-align: right;
    }
    .card-small-icon img{
        border-radius:50%;
    }
    .grid {
        display: grid;
        grid-row-gap: 25px;
    }
</style>

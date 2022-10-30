<script>
import '@fullcalendar/core/vdom' // solves problem with Vite
import FullCalendar from '@fullcalendar/vue'
import dayGridPlugin from '@fullcalendar/daygrid'
import timeGridPlugin from '@fullcalendar/timegrid'
import interactionPlugin from '@fullcalendar/interaction'
import pt from "@fullcalendar/core/locales/pt-br";
import axios from 'axios'




export default {
  components: {
    FullCalendar // make the <FullCalendar> tag available
  },
  data() {
    return {
    data_agendamento: '',
    title: '',
    appointments: '',

      calendarOptions: {
        plugins: [ dayGridPlugin, interactionPlugin, timeGridPlugin ],
        headerToolbar: {
        left: "title",
        right: "today dayGridWeek dayGridMonth prev next",
      },
        initialView: 'dayGridMonth',
          weekends: true, // initial value,
          dateClick: this.handleDateClick,
          calendarWeekends: true,
          selectable:true,
          locale: pt,
          events:'/api/agenda'

      }
    }
  }, methods: {
    toggleWeekends: function() {
      this.calendarOptions.weekends = !this.calendarOptions.weekends // toggle the boolean!
    },
    handleDateClick: function(arg) {
        this.showModal()
        this.data_agendamento = arg.dateStr
    },
    eventClick: function (calEvent, jsEvent, view) {

    },
    showModal() {
        this.$refs['agendaModal'].show()
      },
      hideModal() {
        this.$refs['agendaModal'].hide()
      },
      toggleModal() {
        // We pass the ID of the button that we want to return focus to
        // when the modal has hidden
        this.$refs['agendaModal'].toggle('#toggle-btn')
      },
      async getAppointment() {
      try {
        const appointments = await axios.get(
          "/api/agenda"
        );

        this.appointments = appointments.data;
      } catch (e) {
        console.log(e);
      }
    },
    eventRender(info) {
        alert('aaaa')
        },

    async storeUser() {
  try {
    const apoointment = await axios.post(
      "/api/agenda/store",
      {
        title: this.title,
        data_inicio : this.data_agendamento,
        user_id: 1,
        aluno_id:1,
        data_fim:this.data_agendamento
      }
    );

    if(apoointment.status == 201){
        this.getAppointment()
    }
  } catch(e) {
    console.log(e);
  }
},
  }

}
</script>
<template>
<div>

    <template>
  <div>


    <b-modal ref="agendaModal" hide-footer title="Using Component Methods">
      <div class="d-block text-left">
        <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="title" class="text-left" style="text-align: left;">Titulo</label>
                                <input type="text" class='form-control' id="title" v-model="title">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Data</label>
                                <input type="date" class='form-control' id="data_inicio" v-model="this.data_agendamento" >
                            </div>
                        </div>

                    </div>
      </div>
      <div class="row">
        <div class="col-3">
            <b-button class="mt-2" variant="outline-danger" block @click="hideModal">Fechar</b-button>
            <b-button class="mt-2" variant="outline-warning" block @click="storeUser">Salvar</b-button>
        </div>

     </div>
    </b-modal>
  </div>
</template>
<FullCalendar :options="calendarOptions"   @eventRender="eventRender" />

</div>

</template>

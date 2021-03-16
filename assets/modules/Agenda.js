import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import listPlugin from '@fullcalendar/list';
import InteractionPlugin, { Draggable } from "@fullcalendar/interaction"
require('bootstrap')
const $ = require('jquery');
import axios from 'axios'
import moment from 'moment';


export default class Agenda {

  constructor() {
    let calendarEl = document.getElementById('calendar');

    let calendar = new Calendar(calendarEl, {
      plugins: [timeGridPlugin, InteractionPlugin],
      droppable: true,
      editable: true,
      selectable: true,
      locale: 'fr',
      events:'/api/days',
      select: function (start, event) {

          console.log($(start.start));
          // $('#modalTitle').html(event.title);
          // $('#modalBody').html(event.description);
          // $('#eventUrl').attr('href',event.url);
          $('#calendarModal').modal();
          document.querySelector('button.active').addEventListener('click', ()=>{
            let activite = document.querySelector('input[name="activite"]').value
            let event = {
              label:activite,
              start:moment(start.start).format('DD MM YYYY hh:mm:ss'),
              end:moment(start.end).format('DD MM YYYY hh:mm:ss')
            }
            console.log(event)
            axios.post('/api/days',event).then(resp=>console.log(resp))
            //axios.get('/api/days').then(resp=>console.log(resp))

          })
          calendar.addEvent({
            title:"",
            start:start.start,
            end:start.end
          })
          

      
   // });
  
    
    
  }
})


calendar.render()
}
}

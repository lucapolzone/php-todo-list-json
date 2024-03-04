const { createApp } = Vue

const app = createApp({
  data() {
    return {
      tasks: [],
      endpoint: '../backend/api/'
    }
  },

  methods: {
    //funzione che prendere le tasks dal json
    fetchTasks() {
      axios
        .get(this.endpoint + 'get-tasks.php')
        .then((result) => {
          //'tasks' riceve i dati ottenuti dalla richiesta
          this.tasks = result.data;
        });
    },

    toggleTask(task, index) {
      const data = {
        index, // Indice della task da cambiare da liscia a barrata
        taskText: task.text, // testo della task
        //toogle: inverti lo stato di di taskDone
        taskDone: !task.done
      };

      //chiamo la funzione che fa la chiamata axios per modificare task
      this.axiosChangeTask(data)
    },

    deleteTask(index){
      const data = { index };
      axios
        // POST
        .post(this.endpoint + 'delete-task.php', data,
          //questa riga è specifica di axios POST
          {headers: { 'Content-Type': 'multipart/form-data' }}
        )
        .then((result) => {
          //'tasks' riceve i dati ottenuti dalla richiesta
          this.tasks = result.data;
        })

    },

    //funzione che fa la chiamata axios per modificare task
    axiosChangeTask(data) {
        axios
        // POST
        .post(this.endpoint + 'change-task.php', data,
          //questa riga è specifica di axios POST
          {headers: { 'Content-Type': 'multipart/form-data' }}
        )
        .then((result) => {
          //'tasks' riceve i dati ottenuti dalla richiesta
          this.tasks = result.data;
        })

    }


  },

  mounted() {
    this.fetchTasks();
  }
    
});

app.mount('#app');
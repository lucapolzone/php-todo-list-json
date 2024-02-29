const { createApp } = Vue

const app = createApp({
  data() {
    return {
      tasks: [],
    }
  },

  methods: {
    fetchTasks() {
      axios
        .get("../backend/api/get-tasks.php")
        .then((result) => {
          this.tasks = result.data;
        });
    },
  },

  mounted() {
    this.fetchTasks();
  }
    
});

app.mount('#app');
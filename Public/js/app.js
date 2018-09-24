var dashboardApp = new Vue({
  el: '#chart',

  data:{
    project: {
      'name': '',
      'short_description': '',
      'start_date': '',
      'target_date': '',
      'budget': '',
      'spent': '',
      'projected_spend': '',
      'weekly_effort_target': '',
    },
    tasks:[

      {
        'id': '',
        'title': '',
        'type': '',
        'size': '',
        'team': '',
        'status': '',
        'start_date': '',
        'close_date': '',
        'hours_worked': '',
        'perc_complete': '',
        'current_sprint': ''
      }
    ]
  },

  computed:{
    days_left: function() {
      return moment(this.project.target_date).diff(moment(), 'days')}
    },
    pretty_target_date: function(){
      return this.pretty_date(this.project.target_date)
    },

    methods:{
      pretty_date: function(d){
        return moment(d).format('l')
      },
      pretty_currency: function(val){
        if (val < 1e3){
          return '$' + val
        }
        if (val < 1e6){
          return '$' + (val/1e3).toFixed(1) + 'k'
        }
        return '$' + (val/1e6).toFixed(1) + 'M'
      },
      fetchTasks() {
        fetch('https://raw.githubusercontent.com/tag/iu-msis/dev/public/p1-tasks.json')
        .then( response => response.json())
        //is the same as .then(function (response){return response.json()})
        .then(json => {this.tasks = json})
        .catch(function(err){
          console.log('FETCH ERROR');
          console.log(err);
        })
      },
      fetchData() {
        fetch('https://raw.githubusercontent.com/tag/iu-msis/dev/public/project1.json')
        .then( response => response.json())
        //is the same as .then(function (response){return response.json()})
        .then(json => {this.project = json})
        .catch(function(err){
          console.log('FETCH ERROR');
          console.log(err);
        })
      },
      gotoTask(tid){
        window.location = 'task.html?taskId' + tid;
        const url = new URL(window.loaction.href);
        const taskId = url.searchParams.get("tastId");

        console.log('Task: ' + taskId);
        if(!taskId){
          //TODO:
        }
        //TODO:
        this.fetchTask(taskId)
      }
    },
    created: function() {
      this.fetchTasks();
      this.fetchData();

    }
  })

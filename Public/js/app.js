var dashboardApp = new Vue({
  el: '#chart',
  data: {
    "fname": "Oscar",
    "lname": "Martinez",
    "email": "omart@dmiff.com",
    "phone": "655-212-3090",
    "position": "Accountant",
    "date": "1973-03-12",
    "age": 45
  },

  computed:{
    days_left: function() {return 31}
  },

  methods:{
    pretty_date: function(d){
      return moment(d).format('l')
    }
  }
})

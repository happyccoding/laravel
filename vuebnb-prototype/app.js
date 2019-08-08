var app = new Vue({
  el: "#app",
  data: {
    title: sample.title,
    address: sample.address,
    about: sample.about,
    headerImageStyle: {
      "background-image": "url('sample/header.jpg')"
    },
    amenities: sample.amenities,
    prices: sample.prices,
    contracted: true,
    modalOpen: false
  },
  watch: {
    modalOpen: function() {
      var className = "modal-open";
      if (this.modalOpen) {
        document.body.classList.add(className);
      } else {
        document.body.classList.remove(className);
      }
    }
  },
  created: function() {
    document.addEventListener("keyup", this.escapeKeyListener);
  },
  methods: {
    escapeKeyListener: function(evt) {
      if (evt.keyCode === 27 && this.modalOpen) {
        this.modalOpen = false;
      }
    }
  },
  destroyed: function() {
    document.removeEventListener("keyup", this.escapeKeyListener);
  }
});

// function escapeKeyListener(evt) {
//   if (evt.keyCode === 27 && app.modalOpen) {
//     app.modalOpen = false;
//   }
// }
// document.addEventListener("keyup", function(evt) {
//   if (evt.keyCode === 27 && app.modalOpen) {
//     app.modalOpen = false;
//   }
// });
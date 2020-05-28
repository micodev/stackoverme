<template>
  <div class="menu">
    <!-- <div class="header">Mark Read All as Read</div> -->
    <div
      v-for="notification in notifications"
      :key="notification.id"
      v-bind="notification"
      class="item"
    >
      <!-- <a href="images/image-1.jpg" data-lightbox="image-1" data-title="My caption">Image #1</a> -->
      <img
        class="ui mini circular image"
        src="https://fomantic-ui.com/images/avatar2/small/eve.png"
      />
      <div class="content d-inline" style="margin-bottom:5px;">
        <div class="ui sub header">
          <span class="ui blue text">Molly</span>
        </div>
      </div>
      <div class="ui sub">
        <span class="ui grey text">
          Comment your
          <a>post</a>
        </span>
      </div>
    </div>
    <!-- <div class="item">
                            <img class="ui mini circular image"
                                src="https://fomantic-ui.com/images/avatar2/small/eve.png">
                            <div class="content d-inline" style="margin-bottom:5px;">
                                <div class="ui sub header"> <span class="ui blue text">Molly</span></div>
                            </div>
                            <div class="ui sub"> <span class="ui grey text">like your <a>post</a></span></div>

                        </div>
                        <div class="item">
                            <img class="ui mini circular image" onclick="lightit(this)"
                                src="https://fomantic-ui.com/images/avatar2/small/eve.png">
                            <div class="content d-inline" style="margin-bottom:5px;">
                                <div class="ui sub header"> <span class="ui blue text">Molly</span></div>
                            </div>
                            <div class="ui sub"> <span class="ui grey text">share your <a>post</a></span></div>

    </div>-->
  </div>
</template>

<script>
export default {
  props: ["user_id"],
  data() {
    return {
      notifications: [],
      isConnected: false,
      socketMessage: ""
    };
  },
  //   sockets: {
  //     connect() {
  //       // Fired when the socket connects.
  //       this.isConnected = true;
  //     },

  //     disconnect() {
  //       this.isConnected = false;
  //     },
  //     // Fired when the server sends something on the "messageChannel" channel.
  //     messageChannel(data) {
  //       this.socketMessage = data;
  //       console.log(data);
  //     }
  //   },
  mounted() {
    console.log("notfication-component" + this.user_id);
  },
  methods: {
    read() {
      window.axios.get("/api/Notifications").then(({ data }) => {
        data.forEach(dat => {
          this.notifications.push(dat);
        });
      });
    }
  },
  created() {
    // this.read();
    // window.Echo.channel("channel-name").listen(
    //   "App\\Events\\CommentPost",
    //   function(e, r) {
    //     alert(e);
    //     console.log(e);
    //   }
    // );
  }
};
</script>

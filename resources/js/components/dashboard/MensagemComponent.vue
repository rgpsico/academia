<template>
       <div class="col-md-6">
        <div class="card direct-chat direct-chat-warning">
          <div class="card-header">
            <h3 class="card-title">Mensagem</h3>
            <div class="card-tools">
              <span title="3 New Messages" class="badge badge-warning">3</span>
              <button
                type="button"
                class="btn btn-tool"
                data-card-widget="collapse"
              >
                <i class="fas fa-minus"></i>
              </button>
              <button
                type="button"
                class="btn btn-tool"
                title="Contacts"
                data-widget="chat-pane-toggle"
              >
                <i class="fas fa-comments"></i>
              </button>
              <button
                type="button"
                class="btn btn-tool"
                data-card-widget="remove"
              >
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>

          <div class="card-body">
            <div class="direct-chat-messages">
              <div class="direct-chat-msg right">
                <div class="direct-chat-infos clearfix">
                  <span class="direct-chat-name float-right"
                    >Sarah Bullock</span
                  >
                  <span class="direct-chat-timestamp float-left"
                    >23 Jan 6:10 pm</span
                  >
                </div>

                <img
                  class="direct-chat-img"
                  src="https://adminlte.io/themes/v3/dist/img/user1-128x128.jpg"
                  alt="message user image"
                />

                <div class="direct-chat-text">I would love to.</div>
              </div>
            </div>

            <div class="direct-chat-contacts">
              <ul class="contacts-list">
                <li>
                  <a href="#">
                    <img
                      class="contacts-list-img"
                      src="https://adminlte.io/themes/v3/dist/img/user1-128x128.jpg"
                      alt="User Avatar"
                    />
                    <div class="contacts-list-info">
                      <span class="contacts-list-name">
                        Count Dracula
                        <small class="contacts-list-date float-right"
                          >2/28/2015</small
                        >
                      </span>
                      <span class="contacts-list-msg"
                        >How have you been? I was...</span
                      >
                    </div>
                  </a>
                </li>
              
              </ul>
            </div>
          </div>

          <div class="card-footer">
            <form action="#" method="post">
              <div class="input-group">
                <input
                  type="text"
                  name="message"
                  placeholder="Type Message ..."
                  class="form-control"
                />
                <span class="input-group-append">
                  <button type="button" class="btn btn-warning">Send</button>
                </span>
              </div>
            </form>
          </div>
        </div>
            </div>
</template>

<script>

const default_layout = "default";
export default {
 name:"MensagemComponent"
};
</script>
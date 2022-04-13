class FeedCard extends HTMLElement {
  connectedCallback() {
    var title = this.attributes.title.value;
    var description = this.attributes.description.value;
    var complexity = this.attributes.complexity.value;
    var username = this.attributes.username.value;

    this.innerHTML = `
        <!DOCTYPE html>
        <html>
          <body>
            <div class="card mb-3 recipe-card" style="max-width: 1040px;">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="../images/image 15.jpg" class="img-fluid rounded-start" alt="..." />
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title" >${title}</h5>
                    <span class="material-icons" style="font-size: 35px; float: right;"> share </span>
                    <span class="material-icons" style="font-size: 35px; float: right; margin-right: 10px"> favorite </span>
                    <p style="margin-left: 2%; font-size: 32px;">${description}</p>
                    <div class="complexity-btn">
                      <p class="complexity-level" >Complexity: ${complexity}</p>
                    </div>
                    <div class="user-info" style=" margin-top: 12%;">
                      <div style="float: left;">
                        <div class="stats">
                          <span class="material-icons"> person </span>
                          <h6>${username}</h6>
                        </div>
                        <div class="rating">
                          <span class="material-icons"> star </span>
                          <span class="material-icons"> star </span>
                          <span class="material-icons"> star </span>
                          <span class="material-icons"> star </span>
                          <span class="material-icons"> star </span>
                        </div>
                      </div>
                      <div class="right">
                        <div class="stats">
                          <span class="material-icons"> visibility </span>
                          <h6>15 Recipes</h6>
                        </div>
                        <div class="stats">
                          <span class="material-icons"> chat </span>
                          <h6>30K Followers</h6>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </body>
        </html>        
        `;
  }
}

customElements.define("feed-card", FeedCard);

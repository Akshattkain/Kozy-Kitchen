class FeedCard extends HTMLElement {
    connectedCallback() {
        var title = this.attributes.title.value;
        var description = this.attributes.description.value;
        var complexity = this.attributes.complexity.value;
        var username = this.attributes.username.value;
        var imgPath = this.attributes.imgPath.value;
        var category = this.attributes.category.value;
        var complexityColor =
            complexity == "Easy" ?
            "green" :
            complexity == "Medium" ?
            "#ece400" :
            "red";

        this.innerHTML = `
            <div class="card mb-3 recipe-card" ">
              <div class="row g-0">
                <div class="col-md-4" >
                  <img src="../uploads/${imgPath}" class="img-fluid rounded-start" alt="..."/>
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title" >${title}</h5>
                    <p style="font-size: 1.5vw; color: rgb(117, 117, 117); margin-top: 0 !important; margin-left: 2% !important;">Category: ${category}</p>
                    <span class="material-icons" style="font-size: 35px; float: right;"> share </span>
                    <span class="material-icons" style="font-size: 35px; float: right; margin-right: 10px"> favorite </span>
                    <p style="margin-left: 2%; font-size: 32px;">${description}</p>
                    <div class="complexity-btn" style="background-color: ${complexityColor}">
                      <p class="complexity-level" >${complexity}</p>
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
                          <h6>15 Views</h6>
                        </div>
                        <div class="stats">
                          <span class="material-icons"> chat </span>
                          <h6>30 Comments</h6>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>      
        `;
    }
}

customElements.define("feed-card", FeedCard);
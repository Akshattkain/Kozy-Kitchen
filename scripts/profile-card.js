class ProfileCard extends HTMLElement {
  connectedCallback() {
    var title = this.attributes.title.value;
    var imgPath = this.attributes.imgPath.value;

    this.innerHTML = `
        <!DOCTYPE html>
        <html>
          <head>
            <style>
              .recipe-card {
                background: linear-gradient(
                  180deg,
                  #ffb74b 59.9%,
                  rgba(255, 183, 75, 0) 100%
                );
                padding: 10px;
                border-radius: 10px;
                display: inline-block;
              }

              .recipe-card:hover {
                cursor: pointer;
                box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.5);
              }
        
              .recipe-card .card-title {
                font-size: 28px;
                font-family: "Alegreya Sans SC";
                font-weight: 700;
                display: inline-block;
              }
        
              .share-icon {
                font-size: 30px !important;
                margin-left: 3%;
                float: right;
                line-height: 1.2em;
              }
        
              .comments-icon {
                font-size: 15px;
              }
        
              .comments-count {
                font-size: 15px !important;
              }
            </style>
          </head>
          <body>
            <div class="card recipe-card" style="width: 250px;">
              <img src="../uploads/${imgPath}" class="card-img-top" alt="..." height=250px />
              <div class="card-body">
                <h5 class="card-title">${title}</h5>
                <i class="material-icons share-icon"> share </i>
                <p class="card-text">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                </p>
                <div class="stats-container">
                  <div class="stats">
                    <span class="material-icons"> visibility </span>
                    <h6 style="font-size: 15px">15 Recipes</h6>
                  </div>
                  <div class="stats" style="float: right; margin: 0%">
                    <span class="material-icons comments-icon"> chat </span>
                    <h6 style="font-size: 10px" class="comments-count">
                      30K Followers
                    </h6>
                  </div>
                </div>
              </div>
            </div>
          </body>
        </html>
        
        `;
  }
}

customElements.define("profile-card", ProfileCard);

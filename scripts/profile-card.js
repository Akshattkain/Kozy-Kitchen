class ProfileCard extends HTMLElement {
    connectedCallback() {
        var title = this.attributes.title.value;
        var imgPath = this.attributes.imgPath.value;
        var category = this.attributes.category.value;

        this.innerHTML = `
        <!DOCTYPE html>
        <html>
          <head>
            <style>
              .recipe-card {
                background: linear-gradient(180deg, #FFB74B 59.9%, #FFFFFF 100%);
                padding: 10px;
                border-radius: 10px;
                display: inline-block;
                width: 22vw !important;
              }

              .recipe-card:hover {
                cursor: pointer;
                box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.5);
              }
        
              .recipe-card .card-title {
                font-size: 1.8vw;
                font-family: "Alegreya Sans SC";
                font-weight: 700;
                display: inline-block;
              }
        
              .share-icon {
                font-size: 2vw !important;
                margin-left: 3%;
                float: right;
                line-height: 1.2em;
              }
        
              .comments-icon {
                font-size: 1.5vw !important;
              }
        

              .stats-container {
                margin-top: 15%;
              }

              .views-icon {
                font-size: 1.5vw !important;
              }

              .star-icon {
                font-size: 1vw !important;
              }
            </style>
          </head>
          <body>
            <div class="card recipe-card" style="width: 250px;">
              <img src="../uploads/${imgPath}" class="card-img-top" alt="..." height=250px />
              <div class="card-body">
                <h5 class="card-title">${title}</h5>
                <i class="material-icons share-icon"> share </i>
               <p style="font-size: 0.95vw; color: rgb(117, 117, 117); margin-top: 0 !important; margin-left: 2% !important;">Category: ${category}</p>
                <p class="card-text">
                  <span class="material-icons star-icon"> star </span>
                  <span class="material-icons star-icon"> star </span>
                  <span class="material-icons star-icon"> star </span>
                  <span class="material-icons star-icon"> star </span>
                  <span class="material-icons star-icon"> star </span>
                </p>
                <div class="stats-container">
                  <div class="stats">
                    <span class="material-icons views-icon"> visibility </span>
                    <h6 style="font-size: 1vw">15 Recipes</h6>
                  </div>
                  <div class="stats" style="float: right; margin: 0%">
                    <span class="material-icons comments-icon"> chat </span>
                    <h6 style="font-size: 1vw !important" class="comments-count">
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
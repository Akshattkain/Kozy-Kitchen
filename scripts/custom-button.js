class CustomButton extends HTMLElement {
  connectedCallback() {
    const style = document.createElement("style");

    var iconSize = this.attributes.iconSize.value;
    var textSize = this.attributes.textSize.value;

    style.innerHTML = `
    .btn {
        padding: 0px 5px !important;
    }

    .material-icons {
        font-size: ${iconSize} !important;
        font-weight: bold !important;
        padding-right: 5px
    }
    
    .btn p {
        font-size: ${textSize};
        margin: 0 !important;
        float: right;
        line-height: 1.5em;
        font-family: 'Alegreya Sans SC';
    }
        `;
    document.head.appendChild(style);

    var icon = this.attributes.icon.value;
    var text = this.attributes.text.value;

    this.innerHTML = `
    <button class="btn btn-outline-dark">
        <span class="material-icons"> ${icon} </span>
        <p> ${text} </p>
    </button>
    `;
  }
}

customElements.define("custom-button", CustomButton);

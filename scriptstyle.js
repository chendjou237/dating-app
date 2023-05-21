const pic = document.querySelector('#myImage');
const loadPic = e => {
  pic.style.width = '500px';
  pic.style.height = '500px';
  pic.style.paddingTop = '10px';
  pic.style.display = 'none';
  pic.src = URL.createObjectURL(e.target.files[0]);
  pic.onload = () => URL.revokeObjectURL(pic.src)

}
function show(){
  pic.style.display = 'block'

}
function unshow(){
  pic.style.display = 'none'
}

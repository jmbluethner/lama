window.onload = function setTheme() {
  getCookieByName();
}
function changeTheme(primary,secondary,tertiary,active,accent,critical,message,warning,text,text_light,textSecondary,panes,table_light,table_dark) {
  /*
  Do the same as below, but way tidier and smarter / smaller

  for(var i=0;i!=changeTheme.length;i++) {
    changeRootAttribute();
  }
  */
  changeRootAttribute('--primary',primary);
  changeRootAttribute('--secondary',secondary);
  changeRootAttribute('--tertiary',tertiary);
  changeRootAttribute('--active',active);
  changeRootAttribute('--accent',accent);
  changeRootAttribute('--critical',critical);
  changeRootAttribute('--message',message);
  changeRootAttribute('--warning',warning);
  changeRootAttribute('--text',text);
  changeRootAttribute('--text-light',text_light);
  changeRootAttribute('--textSecondary',textSecondary);
  changeRootAttribute('--panes',panes);
  changeRootAttribute('--table-light',table_light);
  changeRootAttribute('--table-dark',table_dark);
}
function changeRootAttribute(variable,value) {
  document.documentElement.style.setProperty(variable, value);
}

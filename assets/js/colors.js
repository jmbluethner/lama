function delete_cookie(name) {
  document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}

function setTheme(name,primary,secondary,tertiary,active,accent,critical,message,warning,text,text_light,textSecondary,panes,table_light,table_dark) {
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

function changeTheme(name,primary,secondary,tertiary,active,accent,critical,message,warning,text,text_light,textSecondary,panes,table_light,table_dark) {
  /*
  Do the same as below, but way tidier and smarter / smaller

  for(var i=0;i!=changeTheme.length;i++) {
    changeRootAttribute();
  }
  */
  var cookienames = ['--primary','--secondary','--tertiary','--active','--accent','--critical','--message','--message','--warning','--text','--text-light','--textSecondary','--panes','--table-light','--table-dark'];
  for(var lpc=0;lpc!=cookienames.length;lpc++) {
    delete_cookie(cookienames[lpc]);
  }
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
  setCookie('--primary',primary);
  setCookie('--table-dark',table_dark);
  setCookie('--table-light',table_light);
  setCookie('--panes',panes);
  setCookie('--textSecondary',textSecondary);
  setCookie('--text-light',text_light);
  setCookie('--text',text);
  setCookie('--warning',warning);
  setCookie('--message',message);
  setCookie('--secondary',secondary);
  setCookie('--tertiary',tertiary);
  setCookie('--active',active);
  setCookie('--accent',accent);
  setCookie('--critical',critical);
}
function changeRootAttribute(variable,value) {
  document.documentElement.style.setProperty(variable, value);
}
function generateColorset(primary,secondary,tertiary,active,accent,critical,message,warning,text,text_light,textSecondary,panes,table_light,table_dark) {

}

{"version":3,"file":"script.map.js","names":["window","BX","namespace","Sender","Helper","hint","attributeName","attributeInitName","popup","content","init","context","document","body","nodes","querySelectorAll","this","convert","nodeListToArray","forEach","initNode","node","getAttribute","setAttribute","text","addClass","innerHTML","bind","show","hide","createElement","style","margin","maxWidth","PopupWindow","zIndex","darkMode","setBindElement","close","tag","target","items","JSON","parse","$e","PersonalizationSelector","button","targetInput","fields","onClick","item","value","id","PopupMenuWindow","name","map","childItem","_this","length","onclick","autoHide","autoClose","events","bindElement","titleEditor","isInit","params","dataNode","titleNode","inputNode","buttonNode","initialTitle","textContent","defaultTitle","onDataNodeChange","startEdit","onKeyUp","endEdit","disabled","enable","isDisable","changeDisplay","disable","event","keyCode","preventDefault","getTitle","title","focus","getObjectByKey","list","key","filtered","filter","hasOwnProperty","changeClass","className","isAdd","removeClass","replace","data","isDataSafe","util","htmlspecialchars","RegExp","getNode","role","getNodes","type","isDomNode","safe","getTemplate","templateNode","replaceData","getTemplatedNode","template","children","handleKeyEnter","callback","handler","stopPropagation","isShow","display","change","animate","numbers","isString","initialValue","parseInt","tagName","isNaN","easing","duration","start","num","finish","transition","transitions","quart","step","state","number_format","complete","animateShowing","useOpacity","height","opacity","maxHeight","val","pos","stop","animateHiding","apply","isSimple","isBoolean","isShowed","toggle"],"sources":["script.js"],"mappings":"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"}
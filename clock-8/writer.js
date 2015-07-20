function creator(nodeType,nodeName,childNodeName)
{
	var mybody = null;
	this.createdNodeType = nodeType;
	this.createdNodeName = nodeName;
	this.createdChildNodeName = childNodeName;
	var createdNode = document.createElement(nodeType);
	if (childNodeName != null)
	{
		createdNode.setAttribute("class",childNodeName);
		if (!createdNode.className)
                {
                    createdNode.className = childNodeName;
                }
	}
	else
	{
		createdNode.setAttribute("id",nodeName);
	}
	if (childNodeName != null)
	{
		mybody = document.getElementById(nodeName);
	}
	else
	{
		mybody = document.getElementById("mybody");
	}
	mybody.appendChild(createdNode);
}

function writer(parentNode,content,childNode)
{
	if (childNode == null)
	{
		this.nodeName = document.getElementById(parentNode);
		this.nodeName.innerHTML = content;
	}
	else
	{
		this.nodeName = document.getElementById(parentNode)
		this.cl = nodeName.childNodes;
		for (i=0;i<cl.length;i++)
		{
			if (cl[i].className == childNode)
			{
				cl[i].innerHTML = content;
			}
		}
	}
}


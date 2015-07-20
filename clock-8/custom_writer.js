function creator(nodeName,nodeType,cssIdent,childOf)
{
	this.createdNodeType = nodeType;
	this.createdNodeName = nodeName;
	this.createdNode = document.createElement(nodeType);
	this.cssIdent = cssIdent;
	this.createdChildOf = "mybody";
	if (childOf)
	{
		this.createdChildOf = childOf;
	}
	if (this.cssIdent == "class")
	{
		createdNode.setAttribute("class",this.createdNodeName);
		if (!this.createdNode.className)
		{
			this.createdNode.className = this.createdNodeName;
		}
	}
	else if (this.cssIdent == "id")
	{
		createdNode.setAttribute("id",this.createdNodeName);
		if (!this.createdNode.className)
		{
			this.createdNode.idName = this.createdNodeName;
		}
	}
	var makeElement = document.getElementById(createdChildOf);
	makeElement.appendChild(this.createdNode);
}

function writer(content,node,childOf)
{
	if (childOf == null)
	{
		this.nodeName = document.getElementById(node);
		this.nodeName.innerHTML = content;
	}
	if (childOf != null)
	{
		this.parent = document.getElementById(childOf);
		this.children = this.parent.childNodes;
		for (i=0;i<this.children.length;i++)
		{
			if (this.children[i].className == node || this.children[i].idName == node)
			{
				this.children[i].innerHTML = content;
			}
		}
	}
}


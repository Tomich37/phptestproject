let counter = 0

function jsfunction() {
    console.log('wtf');
}

function get_element_html_code(element_name, element_content) {
    let id = 'outer_element_' + counter++

    let block = '<div id="' + id + '" class = "div_p">{block_content}</div>'

    let direction = (
        '<div class="div_p">' +
        '<button class="sml_btn btn" onclick="check(this)">&#8644</button>' +
        '<button class="sml_btn btn" onclick="up(this, \'{id}\')">&#9650</button>'.replace(
            '{id}',
            id,
        ) +
        '<button class="sml_btn btn" onclick="down(this, \'{id}\')">&#9660</button>'.replace(
            '{id}',
            id,
        ) +
        '<h2>{element_name}</h2>' +
        '</div>'
    ).replace('{element_name}', element_name)

    let block_content = '{direction}{subjects}'.replace('{direction}', direction)

    let subjects = ''

    for (let i = 0; i < element_content.length; i++) {
        subjects += (
            '<div id="inner_element">' +
            '<button class="sml_btn btn" onclick="up(this, \'inner_element\')">&#9650</button>' +
            '<button class="sml_btn btn" onclick="down(this, \'inner_element\')">&#9660</button>' +
            '<h3>{text}</h3>' +
            '</div>'
        ).replace('{text}', element_content[i])
    }

    block_content = block_content.replace('{subjects}', subjects)
    block = block.replace('{block_content}', block_content)

    return block
}

function check(object) {
    let element = object.parentElement.parentElement
    if ('right' == element.parentElement.id) {
        element.remove()
    } else {
        let other_container = document.getElementById('right')

        if (null == other_container.querySelector('#' + element.id)) {
            other_container.appendChild(element.cloneNode(true))
        }
    }
}

function get_parent_by_id(current_node, parent_id) {
    let parent = current_node
    while (parent) {
        if (parent.id == parent_id) {
            return parent
        }

        parent = parent.parentElement
    }

    return null
}

function up(object, parent_id) {
    let element = get_parent_by_id(object, parent_id)
    if (
        element &&
        element.previousSibling &&
        element.id.split('_')[0] == element.previousSibling.id.split('_')[0]
    ) {
        element.previousSibling.before(element)
    }
}

function down(object, parent_id) {
    let element = get_parent_by_id(object, parent_id)
    if (
        element &&
        element.nextSibling &&
        element.id.split('_')[0] == element.nextSibling.id.split('_')[0]
    ) {
        element.nextSibling.after(element)
    }
}

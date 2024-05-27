import { Post } from "./src/components/post.js"

const renderPost = item => `
        <span class="post-item_title">
            ${item.title}
        </span>

        <span class="post-item_body">
            ${item.body}
        </span>
    </a>
`
const renderComment = item =>`
    <div class = "comment">
        <span class = "commentName">
            nickname: ${item.name}, email: ${item.email}
        </span>
        <span class = "commentBody">
            ${item.body}
        </span>
    </div>

`

const getPost = async ( postId ) => {
    let res = await fetch(`https://jsonplaceholder.typicode.com/posts/${postId}`);
    const post = await res.json()
    return  post 
}

const getCommentItems = async ( postId ) => {
    let res = await fetch(`https://jsonplaceholder.typicode.com/posts/${postId}/comments`);
    const comments = await res.json()
    return  comments 
}

const init = () => {
    const post = document.getElementById('post')
    new Post(post, { 
        renderPost: renderPost,
        renderComments: renderComment, 
        getPost: getPost,
        getComments: getCommentItems
     }).init()
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init)
} else {
    init()
}

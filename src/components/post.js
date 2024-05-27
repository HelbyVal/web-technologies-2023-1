export class Post {
    #post
    #renderPost = null
    #getPost = null
    #renderComments = null
    #getComments = null
    #postElement = null
    #commentsElement = null
    #postId = null

    constructor(post, options) {
        this.#post = post
        const { renderPost, getPost, renderComments, getComments} = options
        this.#renderPost = renderPost
        this.#getPost = getPost
        this.#renderComments = renderComments
        this.#getComments = getComments
        this.#postElement = post.querySelector('[data-postInfo]')
        this.#commentsElement = post.querySelector('[data-comments]')
        this.#postId = this.getIdPost()
    }

    init () {
        window.onpopstate = () => {
            const url = new URL(window.location.href)
            const postId = +url.searchParams.get('id')

            console.log(1)
            if (postId !== this.#postId) {
                this.setId(postId)
                this.loadItems()
            }
        }

        this.loadItems()
    }

    getIdPost () {
        const url = new URL(window.location.href)
        const id = +url.searchParams.get('id')
        return id || 1;
    }


    setPost (postId) {
        this.#postId = postId
    }

    async loadItems () {
        try {
            let post = await this.#getPost(this.#postId)
            this.#postElement.innerHTML = this.#renderPost(post)
            

            let comments = await this.#getComments(this.#postId)
            this.#commentsElement.innerHTML = comments.map(this.#renderComments).join('')
        } 
        catch (error) {
            console.log(error);
        }
    }
}
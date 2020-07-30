<template>
    <section class="hero is-dark" id="app">
        <div class="hero-body">
            <div class="container">
                <div class="columns">
                    <div class="column is-half">
                        <p class="title">
                            You can also use our API
                        </p>
                        <img alt="Developer using API on computer" src="/img/undraw_developer_activity_bv83.svg" height="300" width="300">
                        <p class="subtitle mt-4">Beware you can only create 10 Short links per minute...</p>
                    </div>
                    <div class="column is-half">
<pre><code class="ruby">require 'uri'
require 'net/http'

url = URI("http://localhost:8000/api/shorturls")

http = Net::HTTP.new(url.host, url.port)

request = Net::HTTP::Post.new(url)
request["content-type"] = 'application/json'
request["accept"] = 'application/json'
request.body = '{"target_url": "http://Gutmann.org/est-ut-ipsum-consequuntur-voluptates-et-totam.html"}'

response = http.request(request)
puts response.read_body</code></pre>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import hljs from 'highlightjs';

    export default {
        name: "ApiAccessComponent",
        mounted() {
            hljs.initHighlightingOnLoad();
        }
    }
</script>

<style scoped>

</style>

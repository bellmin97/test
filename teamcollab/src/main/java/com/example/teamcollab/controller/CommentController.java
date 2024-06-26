package com.example.teamcollab.controller;

import com.example.teamcollab.model.Comment;
import com.example.teamcollab.model.Post;
import com.example.teamcollab.service.CommentService;
import com.example.teamcollab.service.PostService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.*;

import java.security.Principal;

@Controller
public class CommentController {

    @Autowired
    private CommentService commentService;

    @Autowired
    private PostService postService;

    @PostMapping("/posts/{postId}/comments")
    public String addComment(@PathVariable Long postId, Comment comment, Principal principal) {
        Post post = postService.findById(postId);
        comment.setPost(post);
        commentService.save(comment);
        return "redirect:/posts/" + postId;
    }
}

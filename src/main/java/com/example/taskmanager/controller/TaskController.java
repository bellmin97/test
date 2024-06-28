package com.example.taskmanager.controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import com.example.taskmanager.model.Task;
import com.example.taskmanager.repository.TaskRepository;

@Controller
@RequestMapping("/tasks")
public class TaskController {

    @Autowired
    private TaskRepository taskRepository;

    @GetMapping
    public String listTasks(Model model) {
        model.addAttribute("tasks", taskRepository.findAll());
        return "index";
    }

    @GetMapping("/new")
    public String newTaskForm(Model model) {
        model.addAttribute("task", new Task());
        return "taskform";
    }

    @PostMapping
    public String saveTask(Task task) {
        taskRepository.save(task);
        return "redirect:/tasks";
    }
}

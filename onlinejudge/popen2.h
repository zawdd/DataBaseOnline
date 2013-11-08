#ifndef POPEN2_H
#define POPEN2_H

#include <sys/types.h>
#include <unistd.h>

struct popen2 {
    pid_t child_pid;
    int   from_child, to_child;
};

extern int popen2(const char *, struct popen2 *);

#endif

